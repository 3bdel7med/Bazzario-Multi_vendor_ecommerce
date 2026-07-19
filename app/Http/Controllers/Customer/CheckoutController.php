<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\VendorOrder;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{public function store(Request $request)
{
    $request->validate(['shipping_address' => 'required|string']);
    $user = Auth::user();

    // get cart items with product and shop relationships to minimize queries
    $cartItems = $user->cartItems()->with('product.shop')->get();

    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'your cart is empty. Please add products to your cart before checking out.');
    }

    // 1. ensure all products are in stock before proceeding with the order
    foreach ($cartItems as $item) {
        if ($item->quantity > $item->product->stock) {
            return redirect()->back()->with('error', "Sorry, the requested quantity of the product ({$item->product->name}) is not available. Available: {$item->product->stock}");
        }
    }

    $totalPrice = $cartItems->sum(function($item) {
        return $item->product->price * $item->quantity;
    });
    // 2. create the order and related vendor orders and order items within a transaction
    $order = null;

    DB::transaction(function () use ($user, $cartItems, $totalPrice, $request, &$order) {

        $order = Order::create([
            'customer_id' => $user->id,
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),
            'total_amount' => $totalPrice,
            'shipping_address' => $request->shipping_address,
            'payment_status' => 'paid',
        ]);

        $groupedByShop = $cartItems->groupBy('product.shop_id');

        foreach ($groupedByShop as $shopId => $items) {
            $shop = $items->first()->product->shop;

            $subtotal = $items->sum(function($item) {
                return $item->product->price * $item->quantity;
            });
            // calculate commission based on shop's commission rate
            $commissionRate = $shop->commission_rate ?? 0;
            $commission = ($subtotal * $commissionRate) / 100;

            // create vendor order for this shop
            $vendorOrder = VendorOrder::create([
                'vendor_id' => $shop->id,
                'order_id' => $order->id,
                'subtotal' => $subtotal,
                'commission' => $commission,
                'status' => 'pending'
            ]);

            foreach ($items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'vendor_order_id' => $vendorOrder->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);

                // خصم الكمية من المخزن
                $item->product->decrement('stock', $item->quantity);
            }
        }

        // تفريغ السلة للعميل
        $user->cartItems()->delete();
    });

    return redirect()->route('customer.orders')->with('success','your order has been placed successfully.');
}

}

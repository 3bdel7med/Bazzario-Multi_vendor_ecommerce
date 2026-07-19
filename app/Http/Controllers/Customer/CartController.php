<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = auth()->user()->cartItems()->with('product')->get();
        return view('customers.cart.index', compact('cartItems'));
    }
    public function addToCart(Request $request, $productId)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        $cartItem = auth()->user()->cartItems()->where('product_id', $productId)->first();
        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            auth()->user()->cartItems()->create([
                'product_id' => $productId,
                'user_id' => auth()->id(),
                'quantity' => $request->quantity,
            ]);
        }
        return redirect()->route('customer.cart')->with('success', 'Product added to cart successfully.');
    }
}

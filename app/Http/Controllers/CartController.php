<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // add to cart from session
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $cart = $request->session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }
        $request->session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');

        }
    public function removeFromCart(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            $request->session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product removed from cart!');
    }
    public function showCart(Request $request)
    {
        $groupedCart = $request->session()->get('cart', []);

        return view('customers.cart', compact( 'groupedCart'));
    }
}


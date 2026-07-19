<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function productDetail($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        return view('products.product_detail', compact('product'));
    }

}

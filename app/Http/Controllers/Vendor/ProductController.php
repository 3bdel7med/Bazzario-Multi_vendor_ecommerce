<?php

namespace App\Http\Controllers\Vendor;

use App\Events\ProductCreated;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Shop;

class ProductController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::all();
        $products = \App\Models\Product::whereHas('shop', function($q) {
            $q->where('user_id', auth()->id());
        })->latest()->paginate(10);
        $products = auth()->user()->shop->products()->latest()->paginate(10);
        return view('vendor.products.index', compact('products', 'categories'));
    }
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('vendor.products.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        $shop = auth()->user()->shop;
        $shop->products()->create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . time(),
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);
        $product = $shop->products()->latest()->first();
        broadcast(new ProductCreated($product))->toOthers();
        return redirect()->route('vendor.products')->with('success', 'Product created successfully.');
    }
    public function show($id)
    {
        $product = auth()->user()->shop->products()->findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('vendor.products.show', compact('product', 'categories'));
    }
    public function edit($id)
    {
        $product = auth()->user()->shop->products()->findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('vendor.products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        $product = auth()->user()->shop->products()->findOrFail($id);
        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . time(),
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);
        return redirect()->route('vendor.products')->with('success','Product updated successfully.');
    }
    public function destroy($id)
    {
        $product = auth()->user()->shop->products()->findOrFail($id);
        $product->delete();
        return redirect()->route('vendor.products')->with('success','Product deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class ProductController extends Controller
{
    use AuthorizesRequests;

    private $productRepo;
    public function __construct(){
        

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::all()->load('category');
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // authorize the user
        $this->authorize('create', Product::class);
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {


        $product = Product::create($request->all());
        // deal with the file upload if necessary
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = basename($path);
            $product->save();
        }
        return redirect()->route('products')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::findOrFail($product->id);
        return view('admin.products.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        $product = Product::findOrFail($product->id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->authorize('update', $product);
        $product = Product::findOrFail($product->id);
        $product->update($request->all());
        // deal with the file upload if necessary
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = basename($path);
            $product->save();
        }
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product = Product::findOrFail($product->id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}

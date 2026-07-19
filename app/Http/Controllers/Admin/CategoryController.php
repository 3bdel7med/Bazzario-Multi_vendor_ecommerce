<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('parent')->latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());

        return redirect()->route('categories')->with('success','category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category = Category::findOrFail($category->id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category= Category::findOrFail($category->id);
        $category->update($request->all());
        // deal with the file upload if necessary
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('categories', 'public');
            $category->image = basename($path);
            $category->save();
        }
        return redirect()->route('categories')->with('success','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category = Category::findOrFail($category->id);
        $category->delete();
        return redirect()->route('categories')->with('success','category deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $categories =Category::paginate(8);
        return view('frontend.categories',compact('categories'));
    }
    public function show(Category $category)
    {
        $category=$category->load('products');
        return view('frontend.category', compact('category'));
    }

}

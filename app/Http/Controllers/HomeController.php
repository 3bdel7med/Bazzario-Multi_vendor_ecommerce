<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $latestProducts = Product::where('is_active', true)
            ->whereHas('shop', function($query) {
                $query->where('status', 'approved');
            })
            ->latest()
            ->take(8)
            ->get();
        $featuredShops = Shop::where('status', 'approved')->take(4)->get();
        $recommendedProducts = Product::where('is_active', true)
            ->whereHas('shop', function($query) {
                $query->where('status', 'approved');
            })
            ->inRandomOrder()
            ->take(8)
            ->get();
        return view('home', compact('categories', 'latestProducts', 'featuredShops', 'recommendedProducts'));
    }

}

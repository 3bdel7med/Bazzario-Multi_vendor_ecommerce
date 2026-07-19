<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewarrivalsController extends Controller
{
    public function index(){
        $newArrivals = \App\Models\Product::latest()->take(6)->with('category','shop')->get();
        return view('frontend.new-arrivals', compact('newArrivals'));
    }
}

<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index (){
        $categories =Category::all();
        return view('vendor.dashboard', compact('categories'));
    }
}

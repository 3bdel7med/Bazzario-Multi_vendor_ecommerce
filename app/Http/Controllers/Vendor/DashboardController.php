<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $products = auth()->user()->shop->products->latest()->take(5)->get();
        return view('vendor.dashboard', compact('products'));
    }
}

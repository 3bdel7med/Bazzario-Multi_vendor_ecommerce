<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index(){
        $vendors = User::where('role','vendor')->with('shop')->paginate(4);
        return view('frontend.vendors',compact('vendors'));
    }
}

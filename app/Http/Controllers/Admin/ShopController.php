<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $shops = Shop::with('user')->latest()->paginate(10);
        return view('admin.shops.index', compact('shops'));
    }
   public function updateStatus(Request $request, $id) {
        $shop = Shop::findOrFail($id);
        $request->validate(['status' => 'required|in:approved,suspended']);

        $shop->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Shop status updated successfully.');
    }
}

<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopSettingsController extends Controller
{
    public function index()
    {
        $shop = auth()->user()->shop;
        return view('vendor.shop_settings.index', compact('shop'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'logo' => 'nullable|image|max:2048',
            'address' => 'nullable',
            'phone' => 'nullable',
        ]);

        $shop = auth()->user()->shop;
        $shop->update([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('shops', 'public');
            $shop->logo = basename($path);
            $shop->save();
        }

        return redirect()->route('vendor.shop_settings')->with('success', 'Shop settings updated successfully.');
    }
}

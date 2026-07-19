<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->shop->orders()->with('customer')->latest()->paginate(10);
        return view('vendor.orders.index', compact('orders'));
    }
    public function updateStatus(Request $request, $id)
    {
        $order = auth()->user()->shop->orders()->findOrFail($id);
        $request->validate(['status' => 'required|in:pending,processing,completed,cancelled']);

        $order->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

}

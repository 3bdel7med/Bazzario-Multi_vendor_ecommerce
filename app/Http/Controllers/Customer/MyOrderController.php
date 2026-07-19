<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    public function index()
    {
        // Eager load nested relationships: Parent Order -> Sub-Orders -> Items -> Product
        $orders = Auth::user()->orders()
        ->with(['vendorOrders.shop', 'vendorOrders.items.product']) // <-- Ensure shop is right here
        ->latest()
        ->paginate(5);

        return view('customers.orders.index', compact('orders'));

    }
    public function generatePdf(){
              $orders = Auth::user()->orders()
        ->with(['vendorOrders.shop', 'vendorOrders.items.product']) // <-- Ensure shop is right here
        ->latest()
        ->paginate(5);

    $pdf =Pdf::loadView('customers.invoice',compact('orders'));
    return $pdf->stream("Invoice-.pdf");
    }
}

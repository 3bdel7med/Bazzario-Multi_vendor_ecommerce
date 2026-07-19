@extends('layouts.app')
@section('content')
<!-- Cart Content -->
<div class="container py-5">
    <h3 class="fw-bold mb-4">Your Shopping Cart (3 items)</h3>
    <div class="row">
        <div class="col-lg-8">
            <div class="table-responsive">
                <table class="table table-modern border">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="thumb.jpg" width="60" class="rounded-3 me-3">
                                    <div><p class="mb-0 fw-bold">Wireless Headphones</p></div>
                                </div>
                            </td>
                            <td>$199.00</td>
                            <td><input type="number" class="form-control w-50 text-center" value="1"></td>
                            <td class="fw-bold">$199.00</td>
                            <td><button class="btn btn-link text-danger"><i class="bi bi-trash"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 rounded-4 bg-light">
                <h5 class="fw-bold mb-3">Order Summary</h5>
                <div class="d-flex justify-content-between mb-2"><span>Subtotal</span><span>$199.00</span></div>
                <div class="d-flex justify-content-between mb-3"><span>Shipping</span><span>Free</span></div>
                <hr>
                <div class="d-flex justify-content-between mb-4"><span class="h5 fw-bold">Total</span><span class="h5 fw-bold">$199.00</span></div>
                <button class="btn btn-primary w-100 rounded-pill py-3">Checkout Now</button>
            </div>
        </div>
    </div>
</div>
@endsection

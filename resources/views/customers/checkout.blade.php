@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mb-4">Checkout</h1>
    <p class="text-muted mb-4">Review your order details, enter your shipping information, and select a payment method to complete your purchase.</p>
    <div class="row">
        <div class="col-md-6 mb-4">
            <h3 class="mb-3">Shipping Information</h3>
            <form>
                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" placeholder="John Doe">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="123 Main St, City, Country">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" placeholder="+1 234 567 8900">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" placeholder="john.doe@example.com">
                </div>
            </form>
        </div>
        <div class="col-md-6 mb-4">
            <h3 class="mb-3">Payment Information</h3>
            <form>
                <div class="mb-3">
                    <label for="cardNumber" class="form-label">Card Number</label>
                    <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456">
                </div>
                <div class="mb-3">
                    <label for="expiryDate" class="form-label">Expiry Date</label>
                    <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY">
                </div>
                <div class="mb-3">
                    <label for="cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control" id="cvv" placeholder="123">
                </div>
                <div class="mb-3">
                    <label for="cardholderName" class="form-label">Cardholder Name</label>
                    <input type="text" class="form-control" id="cardholderName" placeholder="John Doe">
                </div>
                <button class="btn btn-success">Place Order</button>
            </form>
        </div>
    </div>
</div>
@endsection

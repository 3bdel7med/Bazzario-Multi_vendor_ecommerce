@extends('layouts.app')
@section('content')
@if(session('cart'))
    <!-- اللف على المجموعات (كل مجموعة تمثل تاجراً) -->
    @foreach($cartItems as $vendorId => $items)
        <div class="vendor-section mb-4 border p-3">
            <h3>منتجات التاجر (رقم: {{ $vendorId }})</h3>

            <!-- اللف على منتجات هذا التاجر بالتحديد -->
            @foreach($items as $id => $details)
                <div class="cart-item d-flex justify-content-between">
                    <p>{{ $details['name'] }}</p>
                    <p>الكمية: {{ $details['quantity'] }}</p>
                    <p>السعر: ${{ $details['price'] }}</p>
                </div>
            @endforeach
        </div>
    @endforeach
@else
    <p>سلتك فارغة حالياً.</p>
@endif

    <!-- This is a placeholder cart page. You can replace this with your actual cart implementation. -->
    <div class="container my-5">
        <h1 class="mb-4">Your Shopping Cart</h1>
        <p class="text-muted">Your cart is currently empty. Start adding products to see them here.</p>
        <a href="/" class="btn btn-primary mt-3">Continue Shopping</a>
        <!-- Example of cart items (you can replace this with dynamic content) -->
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://via.placeholder.com/150" class="img-fluid rounded-start" alt="Product Image">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Sample Product</h5>
                        <p class="card-text">This is a brief description of the product. It can include details like size, color, and other attributes.</p>
                        <p class="card-text"><small class="text-muted">Price: $19.99</small></p>
                        <div class="d-flex align-items-center gap-3">
                            <input type="number" class="form-control w-auto" value="1" min="1">
                            <button class="btn btn-danger">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <h3 class="mb-3">Cart Summary</h3>
            <p class="text-muted">Subtotal: $0.00</p>
            <p class="text-muted">Shipping: $0.00</p>
            <p class="text-muted">Total: $0.00</p>
            <button class="btn btn-success" disabled>Proceed to Checkout</button>
        </div>
    </div>
@endsection

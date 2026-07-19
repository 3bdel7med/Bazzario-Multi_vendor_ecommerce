@extends('layouts.app')
@section('content')
<div class="container py-5" dir="ltr">
    <h1 class="display-6 font-weight-extrabold text-dark mb-4">Shopping Cart</h1>

    @if($cartItems->isEmpty())
        <div class="card p-5 border border-light text-center shadow-sm rounded-3">
            <div class="h3 text-muted mb-3">🛒</div>
            <p class="text-secondary mb-0">Your cart is empty! Browse our marketplace to add products.</p>
        </div>
    @else
        <div class="row g-4">
            <!-- Left Side: List of Cart Items grouped by Shop -->
            <div class="col-12 col-lg-8">
                <div class="d-flex flex-column gap-4">
                    @foreach($cartItems->groupBy('product.shop_id') as $shopId => $items)
                        <div class="card border border-light shadow-sm rounded-3 overflow-hidden">
                            <!-- Shop Header Info -->
                            <div class="card-header bg-light border-bottom border-light px-4 py-3 font-weight-bold text-primary d-flex align-items-center gap-2">
                                🏪 Shipped from: <span class="text-decoration-underline text-dark">{{ $items->first()->product->shop->name }}</span>
                            </div>

                            <!-- Items List inside this Vendor Group -->
                            <div class="card-body p-0">
                                <div class="list-group list-group-flush">
                                    @foreach($items as $item)
                                        <div class="list-group-item px-4 py-4 border-light d-flex justify-content-between align-items-center flex-wrap gap-3">
                                            <div>
                                                <h3 class="h6 font-weight-bold text-dark mb-1">{{ $item->product->name }}</h3>
                                                <p class="small text-muted mb-0">Unit Price: ${{ number_format($item->product->price, 2) }}</p>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge bg-light text-dark border px-3 py-2 rounded-2 font-weight-medium small">Qty: {{ $item->quantity }}</span>
                                                <p class="h6 font-weight-bold text-dark mt-2 mb-0">${{ number_format($item->product->price * $item->quantity, 2) }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- right sidebar with order summary and checkout button -->
            <div class="col-12 col-lg-4">
                <div class="card p-4 border border-light shadow-sm rounded-3 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <h3 class="h5 font-weight-bold text-dark border-bottom border-light pb-3 mb-3">Order Summary</h3>
                        <div class="d-flex justify-content-between text-muted small mb-3">
                            <span>Total Items</span>
                            <span class="font-weight-bold text-dark">{{ $cartItems->sum('quantity') }} items</span>
                        </div>
                        <div class="d-flex justify-content-between h5 font-weight-bold text-dark border-top border-light pt-3 mb-4">
                            <span>Grand Total</span>
                            <span class="text-success">${{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</span>
                        </div>
                    </div>
                    <button class="btn btn-success" disabled>Proceed to Checkout</button>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection


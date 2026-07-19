@extends('layouts.app')
@section('title')
{{ $product->title }}
@endsection
@section('content')
<div class="container py-5">
    <div class="row g-5">
        <div class="col-md-6">
            <div class="product-gallery">
                <img src="product-large.jpg" class="img-fluid" alt="Main Image">
            </div>
        </div>
        <div class="col-md-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Electronics</li>
                </ol>
            </nav>
            <h1 class="fw-bold">Smart Watch Series X</h1>
            <div class="d-flex align-items-center mb-3">
                <span class="text-warning me-2"><i class="bi bi-star-fill"></i> 4.9</span>
                <span class="text-muted">(2.4k Reviews)</span>
            </div>
            <h2 class="text-primary fw-bold mb-4">$299.00</h2>
            <p class="text-muted mb-4">This high-performance smartwatch features a stunning Retina display, health tracking, and 18-hour battery life.</p>

            <div class="mb-4">
                <label class="fw-bold mb-2">Quantity</label>
                <input type="number" class="form-control quantity-selector text-center" value="1">
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary btn-lg flex-grow-1 rounded-pill">Add to Cart</button>
                <button class="btn btn-outline-dark btn-lg px-4 rounded-pill"><i class="bi bi-heart"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection

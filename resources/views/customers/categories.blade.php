@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mb-4">Categories</h1>
    <p class="text-muted mb-4">Browse our products by category. Find what you're looking for!</p>
    <div class="row">
        <!-- Example category card (you can replace this with dynamic content) -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Category Image">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Electronics</h5>
                    <p class="card-text">Discover the latest gadgets and devices in our electronics section.</p>
                    <a href="#" class="btn btn-primary mt-2">View Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Category Image">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Clothing</h5>
                    <p class="card-text">Find the perfect outfit for any occasion in our clothing collection.</p>
                    <a href="#" class="btn btn-primary mt-2">View Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Category Image">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Home & Garden</h5>
                    <p class="card-text">Transform your home with our selection of furniture and garden supplies.</p>
                    <a href="#" class="btn btn-primary mt-2">View Products</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

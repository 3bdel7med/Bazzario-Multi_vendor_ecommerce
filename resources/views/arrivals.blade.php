@extends('layouts.app')

@section('title')
<title>New Arrivals</title>
@endsection

@section('content')
<div class="page active" id="page-arrivals">
  <div class="container py-5">
    <h2 class="section-title">New Arrivals</h2>
    <div class="row g-4">
      <!-- Example Product Card -->
      <div class="col-6 col-md-3">
        <div class="card product-card h-100">
          <img src="{{ asset('assets/images/product1.jpg') }}" class="card-img-top" alt="Product Name">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Stylish Sneakers</h5>
            <p class="card-text text-muted mb-2">Brand: SneakerCo</p>
            <div class="mb-3">
              <span class="text-primary fw-bold">$79.99</span>
              <span class="text-muted text-decoration-line-through ms-2">$99.99</span>
            </div>
            <div class="mt-auto">
              <button class="btn btn-outline-primary w-100 mb-2" onclick="showToastCustom('Added to wishlist')">🤍 Add to Wishlist</button>
              <button class="btn btn-primary w-100" onclick="showToastCustom('Added to cart')">� Add to Cart</button>
            </div>
            </div>
        </div>
      </div>
      <!-- Repeat similar product cards for more arrivals -->
    </div>
  </div>
</div>
@endsection


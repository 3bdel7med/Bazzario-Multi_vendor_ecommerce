@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mb-4">Shop</h1>
    <p class="text-muted mb-4">Browse our wide selection of products from various sellers. Find unique items and great deals!</p>
     <!-- filter and sort options -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <label for="category" class="form-label me-2">Category:</label>
            <select id="category" class="form-select d-inline-block w-auto">
                <option value="">All Categories</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="home">Home & Garden</option>
            </select>
            <label for="sort" class="form-label ms-4 me-2">Sort by:</label>
            <select id="sort" class="form-select d-inline-block w-auto">
                <option value="newest">Newest</option>
                <option value="price_asc">Price: Low to High</option>
                <option value="price_desc">Price: High to Low</option>
            </select>
            <button class="btn btn-primary ms-4">Apply</button>
            <button class="btn btn-secondary ms-2">Reset</button>
            <button class="btn btn-outline-secondary ms-2 d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#filterOffcanvas" aria-controls="filterOffcanvas">
                <i class="bi bi-funnel-fill"></i> Filter
            </button>
            <!-- Offcanvas for mobile filters -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="filterOffcanvas" aria-labelledby="filterOffcanvasLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="filterOffcanvasLabel">Filter & Sort</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="mb-3">
                        <label for="offcanvasCategory" class="form-label">Category:</label>
                        <select id="offcanvasCategory" class="form-select">
                            <option value="">All Categories</option>
                            <option value="electronics">Electronics</option>
                            <option value="clothing">Clothing</option>
                            <option value="home">Home & Garden</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="offcanvasSort" class="form-label">Sort by:</label>
                        <select id="offcanvasSort" class="form-select">
                            <option value="newest">Newest</option>
                            <option value="price_asc">Price: Low to High</option>
                            <option value="price_desc">Price: High to Low</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Example product card (you can replace this with dynamic content) -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product Image">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Sample Product</h5>
                    <p class="card-text">This is a brief description of the product. It can include details like size, color, and other attributes.</p>
                    <p class="card-text"><small class="text-muted">Price: $19.99</small></p>
                    <a href="#" class="btn btn-primary mt-auto">Add to Cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product Image">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Sample Product</h5>
                    <p class="card-text">This is a brief description of the product. It can include details like size, color, and other attributes.</p>
                    <p class="card-text"><small class="text-muted">Price: $29.99</small></p>
                    <a href="#" class="btn btn-primary mt-auto">Add to Cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product Image">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Sample Product</h5>
                    <p class="card-text">This is a brief description of the product. It can include details like size, color, and other attributes.</p>
                    <p class="card-text"><small class="text-muted">Price: $39.99</small></p>
                    <a href="#" class="btn btn-primary mt-auto">Add to Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

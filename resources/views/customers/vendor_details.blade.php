@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mb-4">Vendor Details</h1>
    <div class="card mb-4">
        <div class="card-body">
            <h2>Vendor Name</h2>
            <p><strong>Location:</strong> City, Country</p>
            <p><strong>Rating:</strong> 4.5/5</p>
            <p><strong>Description:</strong> Brief description about the vendor and their offerings.</p>
        </div>
    </div>

    <h3 class="mb-3">Products from this Vendor</h3>
    <div class="row">
        <!-- Example Product Card -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product Image">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title mb-2">Product Name</h5>
                    <p class="card-text mb-2">Short description of the product.</p>
                    <div class="mt-auto">
                        <p class="card-text"><strong>Price:</strong> $49.99</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                        <a href="#" class="btn btn-success">Add to Cart</a>
                        <a href="#" class="btn btn-outline-secondary">Add to Wishlist</a>
                        <a href="#" class="btn btn-outline-secondary">Compare</a>
                        <a href="#" class="btn btn-outline-secondary">Share</a>
                        <a href="#" class="btn btn-outline-secondary">Report</a>
                        <a href="#" class="btn btn-outline-secondary">Ask a Question</a>
                    </div>
                    <div class="mt-2">
                        <span class="badge bg-success">In Stock</span>
                        <span class="badge bg-info">Free Shipping</span>
                        <span class="badge bg-warning text-dark">Limited Offer</span>
                        <span class="badge bg-danger">Best Seller</span>
                    </div>
                    <div class="mt-2">
                        <span class="badge bg-primary">New Arrival</span>
                        <span class="badge bg-secondary">Top Rated</span>
                        <span class="badge bg-dark">Exclusive</span>
                        <span class="badge bg-light text-dark">Eco-Friendly</span>
                    </div>
                    <div class="mt-2">
                        <span class="badge bg-success">In Stock</span>
                        <span class="badge bg-info">Free Shipping</span>
                        <span class="badge bg-warning text-dark">Limited Offer</span>

                     </div>
                </div>
            </div>
        </div>
        <!-- Repeat Product Cards as needed -->
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="mb-3">Filter & Search</h3>
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center mb-3">
                <div class="me-md-3 mb-3 mb-md-0">
                    <div class="mb-3">
                        <label for="sort" class="form-label">Sort By:</label>
                        <select id="sort" class="form-select">
                            <option value="">Default</option>
                            <option value="price_asc">Price: Low to High</option>
                            <option value="price_desc">Price: High to Low</option>
                            <option value="rating_desc">Rating: High to Low</option>
                            <option value="rating_asc">Rating: Low to High</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="filter" class="form-label">Filter By:</label>
                        <select id="filter" class="form-select">
                            <option value="">All Products</option>
                            <option value="in_stock">In Stock</option>
                            <option value="free_shipping">Free Shipping</option>
                            <option value="limited_offer">Limited Offer</option>
                            <option value="best_seller">Best Seller</option>
                            <option value="new_arrival">New Arrival</option>
                            <option value="top_rated">Top Rated</option>
                            <option value="exclusive">Exclusive</option>
                            <option value="eco_friendly">Eco-Friendly</option>
                            </select>
                            </div>
                            <div class="mb-3">
                                <label for="sort" class="form-label">Sort By:</label>
                                <select id="sort" class="form-select">
                                    <option value="">Default</option>
                                    <option value="price_asc">Price: Low to High</option>
                                    <option value="price_desc">Price: High to Low</option>
                                    <option value="rating_desc">Rating: High to Low</option>
                                    <option value="rating_asc">Rating: Low to High</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

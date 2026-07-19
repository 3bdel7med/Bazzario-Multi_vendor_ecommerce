@extends('layouts.app')
@section('title')
 hello ! {{ auth()->user()->name }}
@endsection
@section('content')
<div class="container mb-5">
    <div class="row g-4">

          <!-- Left Side Navigation Menu -->
        <div class="col-12 col-md-4 col-lg-3">
            <!-- Profile Card -->
            <div class="card border-0 shadow-sm text-center p-4 mb-3">
                <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=150&auto=format&fit=crop&q=80" alt="User Profile" class="rounded-circle mx-auto mb-3" width="90" height="90">
                <h5 class="fw-bold mb-0">Alex Johnson</h5>
                <p class="text-muted small mb-3">Customer since 2024</p>
                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 fs-7">Gold Member</span>
            </div>

            <!-- Navigation Links -->
            <div class="card border-0 shadow-sm p-2">
                <nav class="nav flex-column account-nav">
                    <a class="nav-link active" href="#"><i class="bi bi-grid me-2"></i> Dashboard</a>
                    <a class="nav-link" href="#"><i class="bi bi-box-seam me-2"></i> My Orders <span class="badge bg-danger rounded-pill float-end mt-1">1</span></a>
                    <a class="nav-link" href="#"><i class="bi bi-heart me-2"></i> Wishlist</a>
                    <a class="nav-link" href="#"><i class="bi bi-chat-square-text me-2"></i> Vendor Messages</a>
                    <a class="nav-link" href="#"><i class="bi bi-geo-alt me-2"></i> Shipping Addresses</a>
                    <a class="nav-link" href="#"><i class="bi bi-credit-card me-2"></i> Payment Methods</a>
                    <a class="nav-link" href="#"><i class="bi bi-person-gear me-2"></i> Account Details</a>
                    <hr class="my-2 text-muted">
                    <a class="nav-link text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
                </nav>
            </div>
        </div>

        <!-- Right Side Main Content Grid -->
        <div class="col-12 col-md-8 col-lg-9">

            <!-- Quick Counters Row -->
            <div class="row g-3 mb-4">
                <div class="col-6 col-sm-4">
                    <div class="card border-0 shadow-sm text-center p-3 bg-white">
                        <h3 class="fw-bold text-primary mb-1">12</h3>
                        <span class="text-muted small">Total Orders</span>
                    </div>
                </div>
                <div class="col-6 col-sm-4">
                    <div class="card border-0 shadow-sm text-center p-3 bg-white">
                        <h3 class="fw-bold text-danger mb-1">5</h3>
                        <span class="text-muted small">Wishlist Items</span>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="card border-0 shadow-sm text-center p-3 bg-white">
                        <h3 class="fw-bold text-success mb-1">$42.50</h3>
                        <span class="text-muted small">Wallet Balance</span>
                    </div>
                </div>
            </div>

            <!-- Recent Order (Dynamic Order Status Tracker) -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-transparent border-0 pt-3 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Latest Order Status</h5>
                    <span class="text-muted small">ID: #MM-85942</span>
                </div>
                <div class="card-body">
                    <div class="p-3 bg-light rounded mb-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="d-flex align-items-center">
                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=100&auto=format&fit=crop&q=80" alt="Product" class="product-img me-3">
                            <div>
                                <h6 class="mb-0 fw-semibold">AeroSport Running Shoes</h6>
                                <span class="badge vendor-badge mt-1"><i class="bi bi-shop me-1 text-warning"></i> Sold by: SneakerHead Ltd</span>
                            </div>
                        </div>
                        <div class="text-md-end">
                            <span class="text-muted d-block small">Estimated Delivery</span>
                            <strong class="text-dark">May 18, 2026</strong>
                        </div>
                    </div>

                    <!-- Progress Tracking Bar -->
                    <div class="row text-center small mt-4 position-relative">
                        <div class="col-4 position-relative">
                            <div class="text-success"><i class="bi bi-check-circle-fill fs-5"></i></div>
                            <div class="fw-semibold mt-1">Confirmed</div>
                        </div>
                        <div class="col-4">
                            <div class="text-primary"><i class="bi bi-truck fs-5 animated-truck"></i></div>
                            <div class="fw-semibold mt-1 text-primary">In Transit</div>
                        </div>
                        <div class="col-4">
                            <div class="text-muted"><i class="bi bi-house-door fs-5"></i></div>
                            <div class="text-muted mt-1">Delivered</div>
                        </div>
                        <!-- Simple visual indicator line behind steps -->
                        <div class="progress position-absolute top-25 start-0 translate-middle-y ms-5 d-none d-sm-flex" style="width: 70%; height: 4px; z-index: 0; left: 5%;">
                            <div class="progress-bar bg-success" style="width: 50%"></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0 pb-3 text-end">
                    <button class="btn btn-sm btn-outline-secondary me-2">Track Order</button>
                    <button class="btn btn-sm btn-primary">Contact Vendor</button>
                </div>
            </div>

            <!-- Grid: Saved Vendors & Wishlist Snapshot -->
            <div class="row g-4">
                <!-- Recent Multi-Vendor Items Wishlist -->
                <div class="col-12 col-lg-7">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-transparent border-0 pt-3">
                            <h5 class="fw-bold mb-0">Saved for Later</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <!-- Wishlist Item 1 -->
                                <div class="list-group-item d-flex align-items-center justify-content-between p-3">
                                    <div class="d-flex align-items-center">
                                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=100&auto=format&fit=crop&q=80" class="product-img me-3" alt="Item">
                                        <div>
                                            <h6 class="mb-0 fw-semibold text-truncate" style="max-width: 180px;">Minimalist Wooden Watch</h6>
                                            <span class="text-muted small">$85.00</span> • <span class="badge vendor-badge">TimberCraft</span>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-primary" title="Add to Cart"><i class="bi bi-cart-plus"></i></button>
                                        <button class="btn btn-sm btn-outline-danger" title="Remove"><i class="bi bi-trash"></i></button>
                                    </div>
                                </div>
                                <!-- Wishlist Item 2 -->
                                <div class="list-group-item d-flex align-items-center justify-content-between p-3">
                                    <div class="d-flex align-items-center">
                                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=100&auto=format&fit=crop&q=80" class="product-img me-3" alt="Item">
                                        <div>
                                            <h6 class="mb-0 fw-semibold text-truncate" style="max-width: 180px;">Studio Headphones Pro</h6>
                                            <span class="text-muted small">$199.99</span> • <span class="badge vendor-badge">AudioPhile Direct</span>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-primary" title="Add to Cart"><i class="bi bi-cart-plus"></i></button>
                                        <button class="btn btn-sm btn-outline-danger" title="Remove"><i class="bi bi-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Followed Shops / Vendors Section -->
                <div class="col-12 col-lg-5">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-transparent border-0 pt-3">
                            <h5 class="fw-bold mb-0">Followed Shops</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                                <div class="d-flex align-items-center">
                                    <div class="bg-warning-subtle text-warning p-2 rounded-circle me-3 text-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-shop"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">TimberCraft</h6>
                                        <small class="text-muted">Handmade Furniture</small>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-light border">Visit</button>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="bg-info-subtle text-info p-2 rounded-circle me-3 text-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-lightning-charge"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">ElectroZap</h6>
                                        <small class="text-muted">Gadgets & Tech</small>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-light border">Visit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

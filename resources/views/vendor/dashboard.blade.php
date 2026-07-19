@extends('layouts.vendor')
@section('title')
hello {{ auth()->user()->name }} in your shop
@endsection
@section('content')
        <!-- Row 1: High-Density Pastel Metric Cards -->
        <section class="row metrics-row">
            <div class="col-md-3 col-sm-6">
                <div class="stat-card bg-mint">
                    <span class="card-icon glyphicon glyphicon-usd"></span>
                    <span class="card-value">$4,250.00</span>
                    <span class="card-label">Today's Sales</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card bg-pink">
                    <span class="card-icon glyphicon glyphicon-gift"></span>
                    <span class="card-value">24</span>
                    <span class="card-label">Orders Pending</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card bg-cream">
                    <span class="card-icon glyphicon glyphicon-eye-open"></span>
                    <span class="card-value">1,105</span>
                    <span class="card-label">Store Visits</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card bg-white border-subtle">
                    <span class="card-icon glyphicon glyphicon-star text-warning"></span>
                    <span class="card-value">4.9</span>
                    <span class="card-label">Seller Rating</span>
                </div>
            </div>
        </section>

        <!-- Row 2: Recent Orders & Inventory Management Panels -->
        <section class="row data-row">
            <!-- Order Management Column -->
            <div class="col-md-8">
                <div class="dashboard-panel">
                    <div class="panel-heading-custom">
                        <h3 class="panel-title-custom">Recent Orders</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table modern-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Product</th>
                                    <th>Customer</th>
                                    <th>Earnings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>#BZ-9481</strong></td>
                                    <td>Summer Sun Hat</td>
                                    <td>Jane Doe</td>
                                    <td>$35.00</td>
                                    <td><span class="status-badge status-progress">Processing</span></td>
                                </tr>
                                <tr>
                                    <td><strong>#BZ-9480</strong></td>
                                    <td>Minimalist Watch</td>
                                    <td>John Smith</td>
                                    <td>$120.00</td>
                                    <td><span class="status-badge status-success">Shipped</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Fast Inventory Alert Column -->
            <div class="col-md-4">
                <div class="dashboard-panel">
                    <div class="panel-heading-custom">
                        <h3 class="panel-title-custom">Stock Alerts</h3>
                    </div>
                    <ul class="list-unstyled stock-alert-list">
                        <li>
                            <div class="alert-item">
                                <span class="badge-stock-low">Only 2 left</span>
                                <h4>Matte Lip Balm</h4>
                                <small class="text-muted">Category: Beauty</small>
                            </div>
                        </li>
                        <li>
                            <div class="alert-item">
                                <span class="badge-stock-out">Out of stock</span>
                                <h4>Wireless Earbuds</h4>
                                <small class="text-muted">Category: Electronics</small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

@endsection

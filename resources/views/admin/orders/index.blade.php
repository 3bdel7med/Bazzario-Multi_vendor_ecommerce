@extends('layouts.admin')
@section('title')
Orders
@endsection
@section('content')
<!-- Main Orders Management Panel (Exclude Header and Sidebar) -->
<div class="p-4" style="background-color: #fcfbfa; min-height: 100vh; font-family: 'Inter', sans-serif;">

    <!-- Page Header Segment -->
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
        <div>
            <h1 class="h3 fw-bold text-dark mb-1">Orders Management</h1>
            <p class="text-muted small mb-0">Track, manage, and monitor all multi-vendor customer transactions and shipments.</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-semibold bg-white border shadow-sm">
                <i class="bi bi-file-earmark-excel me-1"></i> Export Orders
            </button>
        </div>
    </div>

    <!-- Quick Stats Grid for Orders -->
    <div class="row g-4 mb-4">
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <span class="text-muted small fw-semibold d-block mb-1">Pending Orders</span>
                <h4 class="fw-bold text-warning mb-0">14 Orders</h4>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <span class="text-muted small fw-semibold d-block mb-1">Processing</span>
                <h4 class="fw-bold text-primary mb-0">28 Orders</h4>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <span class="text-muted small fw-semibold d-block mb-1">Completed Today</span>
                <h4 class="fw-bold text-success mb-0">45 Shipped</h4>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <span class="text-muted small fw-semibold d-block mb-1">Net Earnings</span>
                <h4 class="fw-bold text-dark mb-0">$8,432.50</h4>
            </div>
        </div>
    </div>

    <!-- Filter & Utility Bar -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-3 mb-4">
        <div class="row g-3 align-items-center">
            <!-- Search bar matching pill layout from image_8bb6a1.png -->
            <div class="col-12 col-md-4">
                <div class="input-group input-group-sm border rounded-pill px-3 py-1 bg-light bg-opacity-50">
                    <span class="input-group-text bg-transparent border-0 text-muted p-0 me-2">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control bg-transparent border-0 p-0 small shadow-none" placeholder="Search by Order ID, Customer...">
                </div>
            </div>
            <!-- Filters -->
            <div class="col-12 col-md-8 d-flex justify-content-md-end gap-2 flex-wrap">
                <select class="form-select form-select-sm rounded-pill px-3 border bg-white text-muted" style="width: auto;">
                    <option selected>All Statuses</option>
                    <option>Pending</option>
                    <option>Processing</option>
                    <option>Completed</option>
                    <option>Canceled</option>
                </select>
                <select class="form-select form-select-sm rounded-pill px-3 border bg-white text-muted" style="width: auto;">
                    <option selected>Payment: All</option>
                    <option>Paid</option>
                    <option>Cash on Delivery</option>
                    <option>Failed</option>
                </select>
                <input type="date" class="form-control form-control-sm rounded-pill px-3 border bg-white text-muted" style="width: auto;">
            </div>
        </div>
    </div>

    <!-- Orders Table Main Card -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary small">
                    <tr>
                        <th class="border-0 rounded-start p-3">Order ID</th>
                        <th class="border-0 p-3">Customer</th>
                        <th class="border-0 p-3">Vendor / Store</th>
                        <th class="border-0 p-3">Date</th>
                        <th class="border-0 p-3">Payment</th>
                        <th class="border-0 p-3">Status</th>
                        <th class="border-0 p-3">Total</th>
                        <th class="border-0 rounded-end p-3 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <!-- Row 1: Completed Order -->
                    <tr>
                        <td class="p-3 fw-bold text-dark">#BZ-9041</td>
                        <td class="p-3">
                            <span class="fw-semibold d-block text-dark">Ahmed Ali</span>
                            <span class="text-muted" style="font-size: 0.75rem;">ahmed@mail.com</span>
                        </td>
                        <td class="p-3">
                            <span class="badge bg-light text-dark border rounded-pill px-2.5 py-1">TechZone Store</span>
                        </td>
                        <td class="p-3 text-muted">June 27, 2026</td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-success-subtle text-success px-2 py-1">Paid</span>
                        </td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-success-subtle text-success px-2 py-1"><i class="bi bi-circle-fill me-1" style="font-size: 0.4rem;"></i> Completed</span>
                        </td>
                        <td class="p-3 fw-bold text-dark">$540.00</td>
                        <td class="p-3 text-end">
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-circle border p-0 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end rounded-3 shadow border-0 small">
                                    <li><a class="dropdown-item p-2 px-3" href="#"><i class="bi bi-eye me-2"></i> View Invoice</a></li>
                                    <li><a class="dropdown-item p-2 px-3" href="#"><i class="bi bi-truck me-2"></i> Track Shipping</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item p-2 px-3 text-danger" href="#"><i class="bi bi-x-circle me-2"></i> Cancel Order</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2: Pending Order -->
                    <tr>
                        <td class="p-3 fw-bold text-dark">#BZ-8932</td>
                        <td class="p-3">
                            <span class="fw-semibold d-block text-dark">Sarah Jenkins</span>
                            <span class="text-muted" style="font-size: 0.75rem;">sarah.j@gmail.com</span>
                        </td>
                        <td class="p-3">
                            <span class="badge bg-light text-dark border rounded-pill px-2.5 py-1">Aura Fashion House</span>
                        </td>
                        <td class="p-3 text-muted">June 26, 2026</td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-warning-subtle text-warning px-2 py-1">COD</span>
                        </td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-warning-subtle text-warning px-2 py-1"><i class="bi bi-circle-fill me-1" style="font-size: 0.4rem;"></i> Pending</span>
                        </td>
                        <td class="p-3 fw-bold text-dark">$125.50</td>
                        <td class="p-3 text-end">
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-circle border p-0 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end rounded-3 shadow border-0 small">
                                    <li><a class="dropdown-item p-2 px-3 text-success fw-semibold" href="#"><i class="bi bi-check-all me-2"></i> Accept Order</a></li>
                                    <li><a class="dropdown-item p-2 px-3" href="#"><i class="bi bi-eye me-2"></i> View Details</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item p-2 px-3 text-danger" href="#"><i class="bi bi-trash me-2"></i> Reject Order</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination Controls -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 pt-3 border-top gap-3">
            <span class="text-muted small">Showing 1 to 2 of 87 orders</span>
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link rounded-pill px-3 py-1 border text-decoration-none me-2 text-muted small bg-light" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link rounded-circle d-inline-flex align-items-center justify-content-center border text-decoration-none me-1 bg-dark text-white fw-bold small" style="width: 32px; height: 32px;" href="#">1</a></li>
                    <li class="page-item"><a class="page-link rounded-circle d-inline-flex align-items-center justify-content-center border text-decoration-none me-1 text-dark bg-white small" style="width: 32px; height: 32px;" href="#">2</a></li>
                    <li class="page-item"><a class="page-link rounded-pill px-3 py-1 border text-decoration-none text-dark bg-white small" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection

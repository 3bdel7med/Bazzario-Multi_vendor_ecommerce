@extends('layouts.admin')
@section('title')
Vendors
@endsection
@section('content')
<!-- Main Vendors Management Panel (Exclude Header and Sidebar) -->
<div class="p-4" style="background-color: #fcfbfa; min-height: 100vh; font-family: 'Inter', sans-serif;">

    <!-- Page Header Segment -->
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
        <div>
            <h1 class="h3 fw-bold text-dark mb-1">Vendor Management</h1>
            <p class="text-muted small mb-0">Oversee store performance, verify new vendors, and manage commission rates.</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-dark btn-sm rounded-pill px-3 fw-semibold shadow-sm">
                <i class="bi bi-shop-window me-1"></i> Add New Vendor
            </button>
        </div>
    </div>

    <!-- Quick Stats Grid for Vendors -->
    <div class="row g-4 mb-4">
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <span class="text-muted small fw-semibold d-block mb-1">Active Stores</span>
                <h4 class="fw-bold text-success mb-0">{{ $adminStats['vendors_count'] ?? '0' }}</h4>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <span class="text-muted small fw-semibold d-block mb-1">Pending Approval</span>
                <h4 class="fw-bold text-warning mb-0">3 Stores</h4>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <span class="text-muted small fw-semibold d-block mb-1">Total Payouts</span>
                <h4 class="fw-bold text-dark mb-0">$42,850</h4>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <span class="text-muted small fw-semibold d-block mb-1">Avg. Commission</span>
                <h4 class="fw-bold text-primary mb-0">12%</h4>
            </div>
        </div>
    </div>

    <!-- Filter & Utility Bar -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-3 mb-4">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-md-5">
                <div class="input-group input-group-sm border rounded-pill px-3 py-1 bg-light bg-opacity-50">
                    <span class="input-group-text bg-transparent border-0 text-muted p-0 me-2">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control bg-transparent border-0 p-0 small shadow-none" placeholder="Search by store name, vendor email...">
                </div>
            </div>
            <div class="col-12 col-md-7 d-flex justify-content-md-end gap-2 flex-wrap">
                <select class="form-select form-select-sm rounded-pill px-3 border bg-white text-muted" style="width: auto;">
                    <option selected>Status: All</option>
                    <option>Verified</option>
                    <option>Pending</option>
                    <option>Suspended</option>
                </select>
                <button class="btn btn-light btn-sm rounded-pill px-3 border fw-medium text-secondary">Export List</button>
            </div>
        </div>
    </div>

    <!-- Vendors Table Main Card -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary small">
                    <tr>
                        <th class="border-0 rounded-start p-3">Store Details</th>
                        <th class="border-0 p-3">Status</th>
                        <th class="border-0 p-3">Commission</th>
                        <th class="border-0 p-3">Revenue (MTD)</th>
                        <th class="border-0 rounded-end p-3 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <!-- Row 1: Approved Vendor -->
                    <tr>
                        <td class="p-3">
                            <div class="d-flex align-items-center">
                                <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=100&q=80" alt="Store" class="rounded-3 me-3 object-fit-cover shadow-sm" style="width: 45px; height: 45px;">
                                <div>
                                    <h5 class="h6 mb-0 fw-bold text-dark">TechZone Store</h5>
                                    <span class="text-muted" style="font-size: 0.75rem;">Ahmed Ali (Owner)</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-success-subtle text-success px-2 py-1"><i class="bi bi-patch-check-fill me-1"></i> Verified</span>
                        </td>
                        <td class="p-3 text-dark fw-medium">10%</td>
                        <td class="p-3 fw-bold text-dark">$12,450.00</td>
                        <td class="p-3 text-end">
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-circle border p-0 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end rounded-3 shadow border-0 small">
                                    <li><a class="dropdown-item p-2 px-3" href="#"><i class="bi bi-eye me-2"></i> View Storefront</a></li>
                                    <li><a class="dropdown-item p-2 px-3" href="#"><i class="bi bi-cash-coin me-2"></i> Manage Payouts</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item p-2 px-3 text-danger" href="#"><i class="bi bi-slash-circle me-2"></i> Suspend Store</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2: Pending Vendor -->
                    <tr>
                        <td class="p-3">
                            <div class="d-flex align-items-center">
                                <div class="rounded-3 me-3 bg-secondary-subtle d-flex align-items-center justify-content-center shadow-sm" style="width: 45px; height: 45px;">
                                    <i class="bi bi-shop text-muted"></i>
                                </div>
                                <div>
                                    <h5 class="h6 mb-0 fw-bold text-dark">Aura Fashion House</h5>
                                    <span class="text-muted" style="font-size: 0.75rem;">Sarah Jenkins (Owner)</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-warning-subtle text-warning px-2 py-1"><i class="bi bi-clock-fill me-1"></i> Pending</span>
                        </td>
                        <td class="p-3 text-dark fw-medium">15%</td>
                        <td class="p-3 fw-bold text-dark">$0.00</td>
                        <td class="p-3 text-end">
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-circle border p-0 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end rounded-3 shadow border-0 small">
                                    <li><a class="dropdown-item p-2 px-3 text-success fw-semibold" href="#"><i class="bi bi-check-circle me-2"></i> Approve Store</a></li>
                                    <li><a class="dropdown-item p-2 px-3" href="#"><i class="bi bi-x-circle me-2"></i> Reject Application</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination Controls -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 pt-3 border-top gap-3">
            <span class="text-muted small">Showing 1 to 2 of 24 vendors</span>
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

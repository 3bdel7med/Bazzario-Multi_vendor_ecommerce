@extends('layouts.admin')
@section('title')
Users
@endsection
@section('content')
<!-- Main Users Management Panel (Exclude Header and Sidebar) -->
<div class="p-4" style="background-color: #fcfbfa; min-height: 100vh; font-family: 'Inter', sans-serif;">

    <!-- Page Header Segment -->
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
        <div>
            <h1 class="h3 fw-bold text-dark mb-1">User Management</h1>
            <p class="text-muted small mb-0">Manage, verify, and monitor all customers and platform vendors across Bazario.</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-semibold bg-white border shadow-sm">
                <i class="bi bi-download me-1"></i> Export CSV
            </button>
            <button class="btn btn-dark btn-sm rounded-pill px-3 fw-semibold shadow-sm">
                <i class="bi bi-person-plus me-1"></i> Add New User
            </button>
        </div>
    </div>

    <!-- Filter & Search Utility Bar -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-3 mb-4">
        <div class="row g-3 align-items-center">
            <!-- Search bar matching pill layout from image_8bb6a1.png -->
            <div class="col-12 col-md-5">
                <div class="input-group input-group-sm border rounded-pill px-3 py-1 bg-light bg-opacity-50">
                    <span class="input-group-text bg-transparent border-0 text-muted p-0 me-2">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control bg-transparent border-0 p-0 small shadow-none" placeholder="Search users by name, email or ID...">
                </div>
            </div>
            <!-- Dynamic Filters -->
            <div class="col-12 col-md-7 d-flex justify-content-md-end gap-2 flex-wrap">
                <select class="form-select form-select-sm rounded-pill px-3 border bg-white text-muted style='width: auto;'">
                    <option selected>All Roles</option>
                    <option>Customer</option>
                    <option>Vendor</option>
                    <option>Admin</option>
                </select>
                <select class="form-select form-select-sm rounded-pill px-3 border bg-white text-muted style='width: auto;'">
                    <option selected>Status: Active</option>
                    <option>Suspended</option>
                    <option>Pending Verification</option>
                </select>
                <button class="btn btn-light btn-sm rounded-pill px-3 border fw-medium text-secondary">Reset Filters</button>
            </div>
        </div>
    </div>

    <!-- Users Table Main Card -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary small">
                    <tr>
                        <th class="border-0 rounded-start p-3">User Profile</th>
                        <th class="border-0 p-3">Role</th>
                        <th class="border-0 p-3">Joined Date</th>
                        <th class="border-0 p-3">Status</th>
                        <th class="border-0 p-3">Spent / Earnings</th>
                        <th class="border-0 rounded-end p-3 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <!-- Row 1: Vendor -->
                    <tr>
                        <td class="p-3">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center fw-bold me-3" style="width: 40px; height: 40px; font-size: 0.85rem;">
                                    AH
                                </div>
                                <div>
                                    <h5 class="h6 mb-0 fw-bold text-dark">abdelhmed</h5>
                                    <span class="text-muted" style="font-size: 0.8rem;">abdelhmed@bazario.com</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-dark text-white px-3 py-1 fw-medium">Vendor</span>
                        </td>
                        <td class="p-3 text-muted">Oct 12, 2025</td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-success-subtle text-success px-2 py-1"><i class="bi bi-circle-fill me-1" style="font-size: 0.4rem;"></i> Active</span>
                        </td>
                        <td class="p-3 fw-bold text-dark">$14,250.00 <span class="text-muted fw-normal small d-block">Earned</span></td>
                        <td class="p-3 text-end">
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-circle border p-0 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end rounded-3 shadow border-0 small">
                                    <li><a class="dropdown-item p-2 px-3" href="#"><i class="bi bi-eye me-2"></i> View Profile</a></li>
                                    <li><a class="dropdown-item p-2 px-3" href="#"><i class="bi bi-pencil me-2"></i> Edit Account</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item p-2 px-3 text-danger" href="#"><i class="bi bi-slash-circle me-2"></i> Suspend Vendor</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2: Regular Customer -->
                    <tr>
                        <td class="p-3">
                            <div class="d-flex align-items-center">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Avatar" class="rounded-circle me-3 object-fit-cover" style="width: 40px; height: 40px;">
                                <div>
                                    <h5 class="h6 mb-0 fw-bold text-dark">Sarah Jenkins</h5>
                                    <span class="text-muted" style="font-size: 0.8rem;">sarah.j@gmail.com</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-light text-dark border px-3 py-1 fw-medium">Customer</span>
                        </td>
                        <td class="p-3 text-muted">Jan 04, 2026</td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-success-subtle text-success px-2 py-1"><i class="bi bi-circle-fill me-1" style="font-size: 0.4rem;"></i> Active</span>
                        </td>
                        <td class="p-3 fw-bold text-dark">$380.50 <span class="text-muted fw-normal small d-block">Spent</span></td>
                        <td class="p-3 text-end">
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-circle border p-0 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end rounded-3 shadow border-0 small">
                                    <li><a class="dropdown-item p-2 px-3" href="#"><i class="bi bi-eye me-2"></i> View Profile</a></li>
                                    <li><a class="dropdown-item p-2 px-3" href="#"><i class="bi bi-pencil me-2"></i> Edit Account</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item p-2 px-3 text-danger" href="#"><i class="bi bi-trash me-2"></i> Delete User</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3: Suspended User -->
                    <tr>
                        <td class="p-3">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-secondary-subtle text-secondary d-flex align-items-center justify-content-center fw-bold me-3" style="width: 40px; height: 40px; font-size: 0.85rem;">
                                    MK
                                </div>
                                <div>
                                    <h5 class="h6 mb-0 fw-bold text-dark">Michael Klein</h5>
                                    <span class="text-muted" style="font-size: 0.8rem;">m.klein@yahoo.com</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-light text-dark border px-3 py-1 fw-medium">Customer</span>
                        </td>
                        <td class="p-3 text-muted">Feb 18, 2026</td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-danger-subtle text-danger px-2 py-1"><i class="bi bi-x-circle-fill me-1" style="font-size: 0.4rem;"></i> Suspended</span>
                        </td>
                        <td class="p-3 fw-bold text-dark">$0.00 <span class="text-muted fw-normal small d-block">Spent</span></td>
                        <td class="p-3 text-end">
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-circle border p-0 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end rounded-3 shadow border-0 small">
                                    <li><a class="dropdown-item p-2 px-3 text-success" href="#"><i class="bi bi-check-circle me-2"></i> Activate User</a></li>
                                    <li><a class="dropdown-item p-2 px-3 text-danger" href="#"><i class="bi bi-trash me-2"></i> Delete Permanently</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Clean Minimal Pagination matching your branding -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 pt-3 border-top gap-3">
            <span class="text-muted small">Showing 1 to 3 of 19 entries</span>
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-list link rounded-pill px-3 py-1 border text-decoration-none me-2 text-muted small bg-light" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-list link rounded-circle d-inline-flex align-items-center justify-content-center border text-decoration-none me-1 bg-dark text-white fw-bold small" style="width: 32px; height: 32px;" href="#">1</a></li>
                    <li class="page-item"><a class="page-list link rounded-circle d-inline-flex align-items-center justify-content-center border text-decoration-none me-1 text-dark bg-white small" style="width: 32px; height: 32px;" href="#">2</a></li>
                    <li class="page-item"><a class="page-list link rounded-circle d-inline-flex align-items-center justify-content-center border text-decoration-none me-2 text-dark bg-white small" style="width: 32px; height: 32px;" href="#">3</a></li>
                    <li class="page-item"><a class="page-list link rounded-pill px-3 py-1 border text-decoration-none text-dark bg-white small" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection


@extends('layouts.admin')
@section('title')
Admin Dashboard
@endsection

@section('content')
<!-- Main Dashboard Content Panel (Exclude Header and Sidebar) -->
<div class="p-4" style="background-color: #fcfbfa; min-height: 100vh; font-family: 'Inter', sans-serif;">

    <!-- Welcome Header Segment -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark mb-1">Dashboard Overview</h1>
            <p class="text-muted small mb-0">Welcome back, abdelhmed! Here is what's happening with Bazario today.</p>
        </div>
        <div>
            <button class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-semibold">
                <i class="bi bi-calendar3 me-1"></i> This Month
            </button>
        </div>
    </div>

    <!-- 1. Top Metrics Cards (Matching the subtle pastel accents in image_8bb6a1.png) -->
    <div class="row g-4 mb-4">
        <!-- Total Revenue Card -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-3 p-2 me-3" style="background-color: #e0ebf6; color: #4a90e2;">
                        <i class="bi bi-currency-dollar fs-4"></i>
                    </div>
                    <span class="text-muted small fw-semibold uppercase tracking-wider">Total Revenue</span>
                </div>
                <h2 class="fw-bold text-dark mb-1">$128,450</h2>
                <span class="text-success small fw-medium"><i class="bi bi-arrow-up-right"></i> +12.5% from last week</span>
            </div>
        </div>

        <!-- Active Vendors Card -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-3 p-2 me-3" style="background-color: #e2f3ec; color: #2ecc71;">
                        <i class="bi bi-shop fs-4"></i>
                    </div>
                    <span class="text-muted small fw-semibold">Active Vendors</span>
                </div>
                <h2 class="fw-bold text-dark mb-1">12</h2>
                <span class="text-success small fw-medium"><i class="bi bi-arrow-up-right"></i> +3 new today</span>
            </div>
        </div>

        <!-- Categories Card -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-3 p-2 me-3" style="background-color: #fef5e6; color: #f39c12;">
                        <i class="bi bi-grid fs-4"></i>
                    </div>
                    <span class="text-muted small fw-semibold">Categories</span>
                </div>
                <h2 class="fw-bold text-dark mb-1">20</h2>
                <span class="text-muted small">Organized clusters</span>
            </div>
        </div>

        <!-- Registered Users Card -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-3 p-2 me-3" style="background-color: #e4f7fc; color: #17a2b8;">
                        <i class="bi bi-people fs-4"></i>
                    </div>
                    <span class="text-muted small fw-semibold">Total Users</span>
                </div>
                <h2 class="fw-bold text-dark mb-1">30</h2>
                <span class="text-success small fw-medium"><i class="bi bi-arrow-up-right"></i> +8% growth</span>
            </div>
        </div>
    </div>

    <!-- 2. Data Section: Table & Insights -->
    <div class="row g-4">
        <!-- Recent Orders Table Area -->
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="h5 fw-bold text-dark mb-0">Recent Multi-Vendor Orders</h3>
                    <a href="#" class="text-decoration-none text-dark small fw-semibold">View All <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light text-secondary small">
                            <tr>
                                <th class="border-0 rounded-start p-3">Order ID</th>
                                <th class="border-0 p-3">Vendor</th>
                                <th class="border-0 p-3">Status</th>
                                <th class="border-0 p-3">Total</th>
                                <th class="border-0 rounded-end p-3 text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody class="small">
                            <tr>
                                <td class="p-3 fw-semibold">#BZ-9041</td>
                                <td class="p-3">TechZone Store</td>
                                <td class="p-3"><span class="badge rounded-pill bg-success-subtle text-success px-2 py-1">Completed</span></td>
                                <td class="p-3 fw-bold">$540.00</td>
                                <td class="p-3 text-end"><button class="btn btn-light btn-sm rounded-pill px-3 border">Details</button></td>
                            </tr>
                            <tr>
                                <td class="p-3 fw-semibold">#BZ-8932</td>
                                <td class="p-3">Aura Fashion House</td>
                                <td class="p-3"><span class="badge rounded-pill bg-warning-subtle text-warning px-2 py-1">Pending</span></td>
                                <td class="p-3 fw-bold">$125.50</td>
                                <td class="p-3 text-end"><button class="btn btn-light btn-sm rounded-pill px-3 border">Details</button></td>
                            </tr>
                            <tr>
                                <td class="p-3 fw-semibold">#BZ-8821</td>
                                <td class="p-3">HomeDeco Central</td>
                                <td class="p-3"><span class="badge rounded-pill bg-danger-subtle text-danger px-2 py-1">Canceled</span></td>
                                <td class="p-3 fw-bold">$89.00</td>
                                <td class="p-3 text-end"><button class="btn btn-light btn-sm rounded-pill px-3 border">Details</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- AI Assistant / Insights Card (Highlights your ML skill context!) -->
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 text-white p-4 h-100" style="background: linear-gradient(135deg, #111111 0%, #2c2c2c 100%);">
                <div class="mb-4">
                    <span class="badge bg-white text-dark rounded-pill mb-2 px-3 py-1 text-uppercase fw-bold tracking-wider style='font-size: 0.75rem;'">Bazario AI</span>
                    <h3 class="h5 fw-bold mt-2">Platform Predictions</h3>
                </div>

                <div class="mb-4 bg-white bg-opacity-10 rounded-3 p-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="small opacity-75">Predicted Sales Demand</span>
                        <span class="small fw-bold text-success">+18%</span>
                    </div>
                    <div class="progress bg-secondary" style="height: 6px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="small text-white-50 mt-2 mb-0" style="font-size: 0.8rem;">Expect a spike in electronics category requests over the next 5 days.</p>
                </div>

                <div class="mt-auto">
                    <h4 class="h6 fw-bold mb-2"><i class="bi bi-stars me-1 text-warning"></i> AI Agent Tasks Pending</h4>
                    <p class="small text-white-50 mb-3">3 Vendor product listings are queued for automated moderation text screening.</p>
                    <button class="btn btn-white w-100 rounded-pill fw-bold bg-white text-dark border-0 py-2">Open AI Control Center</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@extends('layouts.admin')
@section('title')
    notifcations
@endsection
@section('content')
<!-- Main Notifications Management Panel (Exclude Header and Sidebar) -->
<div class="p-4" style="background-color: #fcfbfa; min-height: 100vh; font-family: 'Inter', sans-serif;">

    <!-- Page Header Segment -->
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
        <div>
            <h1 class="h3 fw-bold text-dark mb-1">Notifications Center</h1>
            <p class="text-muted small mb-0">Stay updated with system logs, vendor requests, and customer activities on Bazario.</p>
        </div>
        <div>
            <button class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-semibold bg-white border shadow-sm">
                <i class="bi bi-check2-all me-1"></i> Mark All as Read
            </button>
        </div>
    </div>

    <!-- Filter Tabs Layout -->
    <div class="d-flex gap-2 mb-4 overflow-x-auto pb-2">
        <button class="btn btn-dark btn-sm rounded-pill px-3 fw-medium">All Notifications (12)</button>
        <button class="btn btn-light btn-sm rounded-pill px-3 border fw-medium text-secondary bg-white">Vendor Requests</button>
        <button class="btn btn-light btn-sm rounded-pill px-3 border fw-medium text-secondary bg-white">Payouts</button>
        <button class="btn btn-light btn-sm rounded-pill px-3 border fw-medium text-secondary bg-white">System Alerts</button>
    </div>

    <!-- Notifications List Main Card -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-2">
        <div class="list-group list-group-flush">

            <!-- Notification Item 1: Unread (Vendor Request) -->
            <div class="list-group-item p-3 border-0 rounded-4 mb-2 bg-light bg-opacity-75 position-relative">
                <!-- Unread Blue Dot Indicator -->
                <span class="position-absolute top-50 start-0 translate-middle-y p-1 bg-primary border rounded-circle ms-2" style="height: 8px; width: 8px;"></span>

                <div class="d-flex align-items-start ms-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 40px; height: 40px; background-color: #fef5e6; color: #f39c12;">
                        <i class="bi bi-shop fs-5"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="text-dark fw-bold small mb-0">New Vendor Application Pending</h6>
                            <span class="text-muted" style="font-size: 0.75rem;">Just now</span>
                        </div>
                        <p class="text-secondary small mb-2">Store <span class="fw-semibold text-dark">"Aura Fashion House"</span> submitted a request to join the platform. Review documentation for approval.</p>
                        <div class="d-flex gap-2">
                            <button class="btn btn-dark btn-sm rounded-pill px-3 py-1 fw-semibold" style="font-size: 0.75rem;">Review App</button>
                            <button class="btn btn-light btn-sm rounded-pill px-3 py-1 border text-secondary" style="font-size: 0.75rem;">Dismiss</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notification Item 2: Unread (AI Text Content Alert) -->
            <div class="list-group-item p-3 border-0 rounded-4 mb-2 bg-light bg-opacity-75 position-relative">
                <span class="position-absolute top-50 start-0 translate-middle-y p-1 bg-primary border rounded-circle ms-2" style="height: 8px; width: 8px;"></span>

                <div class="d-flex align-items-start ms-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 40px; height: 40px; background-color: #e4f7fc; color: #17a2b8;">
                        <i class="bi bi-cpu fs-5"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="text-dark fw-bold small mb-0">AI Moderation Task Completed</h6>
                            <span class="text-muted" style="font-size: 0.75rem;">12 mins ago</span>
                        </div>
                        <p class="text-secondary small mb-0">The Python Microservice completed description generations and security check for 3 items from <span class="fw-semibold text-dark">TechZone Store</span>.</p>
                    </div>
                </div>
            </div>

            <!-- Notification Item 3: Read (Financial Payout Request) -->
            <div class="list-group-item p-3 border-0 rounded-4 mb-2">
                <div class="d-flex align-items-start ms-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 40px; height: 40px; background-color: #e2f3ec; color: #2ecc71;">
                        <i class="bi bi-cash-stack fs-5"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="text-dark fw-semibold small mb-0 text-muted">Payout Request Approved</h6>
                            <span class="text-muted" style="font-size: 0.75rem;">2 hours ago</span>
                        </div>
                        <p class="text-muted small mb-0">The withdrawal request of <span class="fw-medium text-dark">$1,250.00</span> by TechZone Store was successfully processed to Vodafone Cash wallet.</p>
                    </div>
                </div>
            </div>

            <!-- Notification Item 4: Read (System Critical Log) -->
            <div class="list-group-item p-3 border-0 rounded-4 mb-2">
                <div class="d-flex align-items-start ms-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 40px; height: 40px; background-color: #fce8e6; color: #e74c3c;">
                        <i class="bi bi-exclamation-triangle fs-5"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="text-dark fw-semibold small mb-0 text-muted">System Cache Cleared</h6>
                            <span class="text-muted" style="font-size: 0.75rem;">Yesterday</span>
                        </div>
                        <p class="text-muted small mb-0">The cache configuration token <span class="badge bg-light text-dark border">admin_sidebar_stats</span> was successfully flushed during a new user hook registration.</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Pagination / Load More Footer -->
        <div class="text-center py-3 border-top mt-2">
            <a href="#" class="text-decoration-none text-dark small fw-bold">Load Older Notifications <i class="bi bi-chevron-down ms-1"></i></a>
        </div>
    </div>
</div>
@endsection

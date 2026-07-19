@extends('layouts.vendor')
@section('content')
<div class="container">
    <h1 class="mb-4">Order Management</h1>
    <p class="text-muted mb-4">Manage your orders, update statuses, and track shipments to ensure a smooth customer experience.</p>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example order item (replace with dynamic content) -->
                <tr>
                    <td><a href="#" class="text-decoration-none fw-semibold">#ORD-12345</a></td>
                    <td>John Doe</td>
                    <td>May 10, 2026</td>
                    <td>$199.99</td>
                    <td><span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3 py-2">Processing</span></td>
                    <td><button class="btn btn-sm btn-outline-secondary">Manage</button></td>
                </tr>
                <!-- Repeat order items as needed -->
                <tr>
                    <td><a href="#" class="text-decoration-none fw-semibold">#ORD-12346</a></td>
                    <td>Jane Smith</td>
                    <td>May 12, 2026</td>
                    <td>$89.99</td>
                    <td><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2">Shipped</span></td>
                    <td><button class="btn btn-sm btn-outline-secondary">Manage</button></td>
                </tr>
                <tr>
                    <td><a href="#" class="text-decoration-none fw-semibold">#ORD-12347</a></td>
                    <td>Emily Johnson</td>
                    <td>May 15, 2026</td>
                    <td>$49.99</td>
                    <td><span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-2">Cancelled</span></td>
                    <td><button class="btn btn-sm btn-outline-secondary">Manage</button></td>
                </tr>
                <tr>
                    <td><a href="#" class="text-decoration-none fw-semibold">#ORD-12348</a></td>
                    <td>Michael Brown</td>
                    <td>May 18, 2026</td>
                    <td>$149.99</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info rounded-pill px-3 py-2">Delivered</span></td>
                    <td><button class="btn btn-sm btn-outline-secondary">Manage</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

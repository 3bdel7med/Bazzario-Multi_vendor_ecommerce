@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mb-4">My Orders</h1>
        <p class="text-muted">Here you can view your order history.</p>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Total</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example order item (replace with dynamic content) -->
                    <tr>
                        <td>#12345</td>
                        <td>2024-06-01</td>
                        <td><span class="badge bg-success">Delivered</span></td>
                        <td>$99.99</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm mb-1">View Details</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm mb-1">Reorder</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm mb-1">Leave Feedback</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm mb-1">Report an Issue</a>
                        </td>
                    </tr>
                    <!-- Repeat order items as needed -->
                    <tr>
                        <td>#12346</td>
                        <td>2024-06-05</td>
                        <td><span class="badge bg-warning text-dark">Processing</span></td>
                        <td>$49.99</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm mb-1">View Details</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm mb-1">Cancel Order</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm mb-1">Contact Support</a>
                        </td>
                    </tr>
                    <tr>
                        <td>#12347</td>
                        <td>2024-06-10</td>
                        <td><span class="badge bg-danger">Cancelled</span></td>
                        <td>$29.99</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm mb-1">View Details</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm mb-1">Reorder</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm mb-1">Contact Support</a>
                        </td>
                    </tr>
                </tbody>

            </table>
            <!-- Pagination (replace with dynamic content) -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
            <div class="text-center mt-4">
                <a href="#" class="btn btn-secondary">Continue Shopping</a>
                <a href="#" class="btn btn-outline-secondary">View Wishlist</a>
                <a href="#" class="btn btn-outline-secondary">Contact Support</a>
                <a href="#" class="btn btn-outline-secondary">Download Invoice</a>
                <a href="#" class="btn btn-outline-secondary">Share Order</a>
                <a href="#" class="btn btn-outline-secondary">Report an Issue</a>
            </div>

        </div>
    </div>

@endsection

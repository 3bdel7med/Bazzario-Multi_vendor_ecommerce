@extends('layouts.vendor')
@section('content')
<div class="container">
    <h1 class="mb-4">Earnings</h1>
    <p class="text-muted mb-4">View your earnings, track payments, and manage your financial performance to grow your business.</p>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example earning item (replace with dynamic content) -->
                <tr>
                    <td>2024-06-01</td>
                    <td>$199.99</td>
                    <td><span class="badge bg-success">Paid</span></td>
                    <td><button class="btn btn-sm btn-outline-secondary">View Details</button></td>
                </tr>
                <!-- Repeat earning items as needed -->
                <tr>
                    <td>2024-06-15</td>
                    <td>$89.99</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                    <td><button class="btn btn-sm btn-outline-secondary">View Details</button></td>
                </tr>
                <tr>
                    <td>2024-06-20</td>
                    <td>$49.99</td>
                    <td><span class="badge bg-danger">Failed</span></td>
                    <td><button class="btn btn-sm btn-outline-secondary">View Details</button></td>
                </tr>
            </tbody>

        </table>

        <!-- Pagination (replace with dynamic content) -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <!-- Example pagination items -->
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection

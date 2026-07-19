@extends('layouts.vendor')
@section('content')
<div class="container">
    <h1 class="mb-4">Product Management</h1>
    <p class="text-muted mb-4">Manage your products, update details, and track inventory to ensure your customers have the best shopping experience.</p>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example product item (replace with dynamic content) -->
                <tr>
                    <td>#P12345</td>
                    <td>Product Name</td>
                    <td>Category Name</td>
                    <td>$49.99</td>
                    <td>100</td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm mb-1">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm mb-1">Delete</a>
                        <a href="#" class="btn btn-outline-secondary btn-sm mb-1">View Details</a>
                        <a href="#" class="btn btn-outline-secondary btn-sm mb-1">Duplicate</a>
                        <a href="#" class="btn btn-outline-secondary btn-sm mb-1">Manage Inventory</a>
                        <a href="#" class="btn btn-outline-secondary btn-sm mb-1">View Sales Analytics</a>
                        <a href="#" class="btn btn-outline-secondary btn-sm mb-1">Promote Product</a>
                        <a href="#" class="btn btn-outline-secondary btn-sm mb-1">Report an Issue</a>
                    </td>
                </tr>
                <!-- Repeat product items as needed -->
            </tbody>

        </table>

        <!-- Pagination (replace with dynamic content) -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
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

@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mb-4">Vendors</h1>
    <p class="text-muted mb-4">Discover our trusted vendors. Browse their profiles, read reviews, and find the best sellers for your needs.</p>
    <div class="row">
        <!-- Example vendor card (you can replace this with dynamic content) -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Vendor Image">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Vendor Name</h5>
                    <p class="card-text">This is a brief description of the vendor. It can include details like location, specialties, and other attributes.</p>
                    <p class="card-text"><small class="text-muted">Rating: 4.5/5</small></p>
                    <a href="#" class="btn btn-primary mt-auto">View Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Vendor Image">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Vendor Name</h5>
                    <p class="card-text">This is a brief description of the vendor. It can include details like location, specialties, and other attributes.</p>
                    <p class="card-text"><small class="text-muted">Rating: 4.0/5</small></p>
                    <a href="#" class="btn btn-primary mt-auto">View Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 ">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Vendor Image">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Vendor Name</h5>
                    <p class="card-text">This is a brief description of the vendor. It can include details like location, specialties, and other attributes.</p>
                    <p class="card-text"><small class="text-muted">Rating: 4.8/5</small></p>
                    <a href="#" class="btn btn-primary mt-auto">View Profile</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button class="btn btn-secondary mb-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilters" aria-controls="offcanvasFilters">
                Filter & Sort
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasFilters" aria-labelledby="offcanvasFiltersLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasFiltersLabel">Filter & Sort Vendors</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="mb-3">
                        <label for="offcanvasCategory" class="form-label">Category:</label>
                        <select id="offcanvasCategory" class="form-select">
                            <option value="">All Categories</option>
                            <option value="electronics">Electronics</option>
                            <option value="clothing">Clothing</option>
                            <option value="home">Home & Garden</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="offcanvasSort" class="form-label">Sort by:</label>
                        <select id="offcanvasSort" class="form-select">
                            <option value="newest">Newest</option>
                            <option value="rating_desc">Rating: High to Low</option>
                            <option value="rating_asc">Rating: Low to High</option>
                        </select>

                    </div>
                    <input type="text" class="form-control mb-3" placeholder="Search by name or location">
                    <button class="btn btn-primary">Apply Filters</button>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

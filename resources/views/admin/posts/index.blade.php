@extends('layouts.admin')
@section('title')
Posts
@endsection
@section('content')
<!-- Main Posts Management Panel (Exclude Header and Sidebar) -->
<div class="p-4" style="background-color: #fcfbfa; min-height: 100vh; font-family: 'Inter', sans-serif;">

    <!-- Page Header Segment -->
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
        <div>
            <h1 class="h3 fw-bold text-dark mb-1">Blog Posts</h1>
            <p class="text-muted small mb-0">Create, edit, and moderate articles published on the Bazario marketplace blog.</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-semibold bg-white border shadow-sm">
                <i class="bi bi-folder-symlink me-1"></i> Categories
            </button>
            <button class="btn btn-dark btn-sm rounded-pill px-3 fw-semibold shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Write New Post
            </button>
        </div>
    </div>

    <!-- Quick Stats Grid for Blog -->
    <div class="row g-4 mb-4">
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <span class="text-muted small fw-semibold d-block mb-1">Total Posts</span>
                <h4 class="fw-bold text-dark mb-0">48 Articles</h4>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <span class="text-muted small fw-semibold d-block mb-1">Published</span>
                <h4 class="fw-bold text-success mb-0">42 Live</h4>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <span class="text-muted small fw-semibold d-block mb-1">Drafts</span>
                <h4 class="fw-bold text-warning mb-0">6 Pending</h4>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <span class="text-muted small fw-semibold d-block mb-1">Total Views</span>
                <h4 class="fw-bold text-dark mb-0">12.4K Reads</h4>
            </div>
        </div>
    </div>

    <!-- Filter & Utility Bar -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-3 mb-4">
        <div class="row g-3 align-items-center">
            <!-- Search field matching pill input design -->
            <div class="col-12 col-md-5">
                <div class="input-group input-group-sm border rounded-pill px-3 py-1 bg-light bg-opacity-50">
                    <span class="input-group-text bg-transparent border-0 text-muted p-0 me-2">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control bg-transparent border-0 p-0 small shadow-none" placeholder="Search posts by title, tags or author...">
                </div>
            </div>
            <!-- Filters -->
            <div class="col-12 col-md-7 d-flex justify-content-md-end gap-2 flex-wrap">
                <select class="form-select form-select-sm rounded-pill px-3 border bg-white text-muted" style="width: auto;">
                    <option selected>All Categories</option>
                    <option>E-Commerce Tips</option>
                    <option>Product Reviews</option>
                    <option>Marketplace News</option>
                </select>
                <select class="form-select form-select-sm rounded-pill px-3 border bg-white text-muted" style="width: auto;">
                    <option selected>Status: All</option>
                    <option>Published</option>
                    <option>Draft</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Posts Grid / Table Main Card -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary small">
                    <tr>
                        <th class="border-0 rounded-start p-3" style="width: 40%;">Article Title</th>
                        <th class="border-0 p-3">Author</th>
                        <th class="border-0 p-3">Category</th>
                        <th class="border-0 p-3">Status</th>
                        <th class="border-0 p-3"><i class="bi bi-eye me-1"></i> Views</th>
                        <th class="border-0 rounded-end p-3 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <!-- Row 1: Sample Post -->
                    <tr>
                        <td class="p-3">
                            <div class="d-flex align-items-center">
                                <!-- Post Image Thumbnail -->
                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=120&q=80" alt="Cover" class="rounded-3 me-3 object-fit-cover" style="width: 64px; height: 44px;">
                                <div class="text-truncate" style="max-width: 300px;">
                                    <h5 class="h6 mb-1 fw-bold text-dark text-truncate">10 Ways to Boost Your Multi-Vendor Store Sales</h5>
                                    <span class="text-muted d-block" style="font-size: 0.75rem;">Published on June 20, 2026</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-3">
                            <span class="fw-medium text-dark">Admin (abdelhmed)</span>
                        </td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-light text-dark border px-2.5 py-1">E-Commerce Tips</span>
                        </td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-success-subtle text-success px-2 py-1">Published</span>
                        </td>
                        <td class="p-3 text-muted fw-semibold">1,240</td>
                        <td class="p-3 text-end">
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-circle border p-0 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end rounded-3 shadow border-0 small">
                                    <li><a class="dropdown-item p-2 px-3" href="#"><i class="bi bi-pencil me-2"></i> Edit Post</a></li>
                                    <li><a class="dropdown-item p-2 px-3" href="#"><i class="bi bi-box-arrow-up-right me-2"></i> View Live</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item p-2 px-3 text-danger" href="#"><i class="bi bi-trash me-2"></i> Delete Article</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2: Vendor Pending Post -->
                    <tr>
                        <td class="p-3">
                            <div class="d-flex align-items-center">
                                <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=120&q=80" alt="Cover" class="rounded-3 me-3 object-fit-cover" style="width: 64px; height: 44px;">
                                <div class="text-truncate" style="max-width: 300px;">
                                    <h5 class="h6 mb-1 fw-bold text-dark text-truncate">Top Smartwatches Trends to Follow This Summer</h5>
                                    <span class="text-muted d-block" style="font-size: 0.75rem;">Submitted on June 25, 2026</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-3">
                            <span class="fw-medium text-dark">TechZone Store <span class="badge bg-secondary-subtle text-secondary rounded-pill" style="font-size: 0.65rem;">Vendor</span></span>
                        </td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-light text-dark border px-2.5 py-1">Product Reviews</span>
                        </td>
                        <td class="p-3">
                            <span class="badge rounded-pill bg-warning-subtle text-warning px-2 py-1">Pending Approval</span>
                        </td>
                        <td class="p-3 text-muted fw-semibold">0</td>
                        <td class="p-3 text-end">
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-circle border p-0 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end rounded-3 shadow border-0 small">
                                    <li><a class="dropdown-item p-2 px-3 text-success fw-semibold" href="#"><i class="bi bi-check-circle me-2"></i> Approve & Live</a></li>
                                    <li><a class="dropdown-item p-2 px-3" href="#"><i class="bi bi-pencil me-2"></i> Review Content</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item p-2 px-3 text-danger" href="#"><i class="bi bi-x-circle me-2"></i> Reject Post</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination Controls -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 pt-3 border-top gap-3">
            <span class="text-muted small">Showing 1 to 2 of 48 entries</span>
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

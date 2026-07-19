@extends('layouts.admin')
@section('title')
Tags
@endsection
@section('content')
<!-- Main Tags Management Panel (Exclude Header and Sidebar) -->
<div class="p-4" style="background-color: #fcfbfa; min-height: 100vh; font-family: 'Inter', sans-serif;">

    <!-- Page Header Segment -->
    <div class="mb-4">
        <h1 class="h3 fw-bold text-dark mb-1">Product Tags</h1>
        <p class="text-muted small mb-0">Manage keywords and tags used by vendors to optimize product discoverability and SEO.</p>
    </div>

    <!-- Main Content Row split into Form and List -->
    <div class="row g-4">

        <!-- Left Column: Add New Tag Form -->
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4 sticky-lg-top" style="top: 24px; z-index: 10;">
                <h3 class="h5 fw-bold text-dark mb-3">Create New Tag</h3>

                <form action="" method="POST">
                    <!-- @csrf -->
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Tag Name</label>
                        <input type="text" name="name" class="form-control form-control-sm rounded-pill px-3 border bg-light bg-opacity-50" placeholder="e.g., Summer Collection" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Slug <span class="text-muted fw-normal">(Optional)</span></label>
                        <input type="text" name="slug" class="form-control form-control-sm rounded-pill px-3 border bg-light bg-opacity-50" placeholder="e.g., summer-collection">
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">Description</label>
                        <textarea name="description" rows="3" class="form-control form-control-sm rounded-4 p-3 border bg-light bg-opacity-50" placeholder="Brief explanation of what this tag covers..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark btn-sm w-100 rounded-pill fw-semibold py-2 shadow-sm">
                        <i class="bi bi-plus-circle me-1"></i> Save Tag
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Column: Tags Data Table -->
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4">

                <!-- Search within tags utility bar -->
                <div class="mb-4">
                    <div class="input-group input-group-sm border rounded-pill px-3 py-1 bg-light bg-opacity-50" style="max-width: 350px;">
                        <span class="input-group-text bg-transparent border-0 text-muted p-0 me-2">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control bg-transparent border-0 p-0 small shadow-none" placeholder="Search tags...">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light text-secondary small">
                            <tr>
                                <th class="border-0 rounded-start p-3">Tag Name</th>
                                <th class="border-0 p-3">Slug</th>
                                <th class="border-0 p-3 text-center">Tagged Products</th>
                                <th class="border-0 rounded-end p-3 text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="small">
                            <!-- Row 1 -->
                            <tr>
                                <td class="p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-3 p-2 me-3 bg-light text-dark">
                                            <i class="bi bi-hash fs-5"></i>
                                        </div>
                                        <div>
                                            <span class="fw-bold text-dark d-block">Smart Electronics</span>
                                            <span class="text-muted" style="font-size: 0.75rem;">For wearable tech and smart gadgets.</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-3 text-muted">smart-electronics</td>
                                <td class="p-3 text-center fw-bold text-dark">
                                    <span class="badge rounded-pill bg-dark text-white px-2.5 py-1">142 items</span>
                                </td>
                                <td class="p-3 text-end">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm rounded-circle border p-0 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end rounded-3 shadow border-0 small">
                                            <li><a class="dropdown-item p-2 px-3" href="#"><i class="bi bi-pencil me-2"></i> Edit Tag</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item p-2 px-3 text-danger" href="#"><i class="bi bi-trash me-2"></i> Delete Tag</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 2 -->
                            <tr>
                                <td class="p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-3 p-2 me-3 bg-light text-dark">
                                            <i class="bi bi-hash fs-5"></i>
                                        </div>
                                        <div>
                                            <span class="fw-bold text-dark d-block">Eco Friendly</span>
                                            <span class="text-muted" style="font-size: 0.75rem;">Sustainable organic items.</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-3 text-muted">eco-friendly</td>
                                <td class="p-3 text-center fw-bold text-dark">
                                    <span class="badge rounded-pill bg-light text-dark border px-2.5 py-1">38 items</span>
                                </td>
                                <td class="p-3 text-end">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm rounded-circle border p-0 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end rounded-3 shadow border-0 small">
                                            <li><a class="dropdown-item p-2 px-3" href="#"><i class="bi bi-pencil me-2"></i> Edit Tag</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item p-2 px-3 text-danger" href="#"><i class="bi bi-trash me-2"></i> Delete Tag</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Controls -->
                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                    <span class="text-muted small">Showing 1 to 2 of 56 tags</span>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link rounded-pill px-3 py-1 border text-decoration-none me-2 text-muted small bg-light" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link rounded-circle d-inline-flex align-items-center justify-content-center border text-decoration-none bg-dark text-white fw-bold small" style="width: 32px; height: 32px;" href="#">1</a></li>
                            <li class="page-item ms-1"><a class="page-link rounded-pill px-3 py-1 border text-decoration-none text-dark bg-white small" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection

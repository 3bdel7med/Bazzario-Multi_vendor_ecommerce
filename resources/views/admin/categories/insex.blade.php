@extends('layouts.admin')
@section('content')
<!-- all categories in a table with edit and delete options -->
<div class="col-lg-9 col-xl-10">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">My Categories</h2>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New Category</a>
    </div>
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="border-0 ps-4">Category</th>
                        <th class="border-0 pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td class="ps-4 d-flex align-items-center">
                            @if($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                            @else
                                <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                                    {{ strtoupper(substr($category->name, 0, 1)) }}
                                </div>
                            @endif
                            <span>{{ $category->name }}</span>
                        </td>
                        <td class="pe-4">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

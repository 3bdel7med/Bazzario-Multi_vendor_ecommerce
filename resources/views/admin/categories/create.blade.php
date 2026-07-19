@extends('layouts.admin')
@section('content')
    <div class="col-lg-9 col-xl-10">
        <h2 class="fw-bold mb-4">Add New Category</h2>
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
        </div>
    </div>
@endsection

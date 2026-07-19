@extends('layouts.admin')
@section('content')
<!-- show all products in a table with edit and delete options -->
<div class="col-lg-9 col-xl-10">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">My Products</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
    </div>
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="border-0 ps-4">Product</th>
                        <th class="border-0">Price</th>
                        <th class="border-0">Category</th>
                        <th class="border-0">Stock</th>
                        <th class="border-0 pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="ps-4 d-flex align-items-center">
                            <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <span>{{ $product->name }}</span>
                        </td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td class="pe-4">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
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

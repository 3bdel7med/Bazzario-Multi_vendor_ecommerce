@extends('layouts.admin')
@section('content')
<div class="col-lg-9 col-xl-10">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Show Product</h2>
        <a href="{{ route('admin.products.index') }}" class="btn btn-light">Back to Products</a>
    </div>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="row g-4">
            <div class="col-md-4">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded w-100" style="object-fit: cover; max-height: 300px;">
                @else
                    <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center w-100" style="height: 300px;">
                        {{ strtoupper(substr($product->name, 0, 1)) }}
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <h3 class="fw-bold">{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                <p><strong>Status:</strong> {{ $product->status ? 'Active' : 'Inactive' }}</p>
                <p><strong>Category:</strong> {{ $product->category->name }}</p>
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>
            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Product</button>
            </form>
        </div>
    </div>
</div>
@endsection

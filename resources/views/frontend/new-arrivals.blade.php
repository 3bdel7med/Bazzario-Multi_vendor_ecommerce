@extends('layouts.app')

@section('title', 'New Arrivals - Bazario')
@section('styles')
<style>
    /* Clean Grid Design for Multi-Vendor E-Commerce */
.trending-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 24px;
    margin-bottom: 2rem;
}

/* Modern Card Layout */
.prod-card {
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    display: flex;
    flex-direction: column;
}

.prod-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}

/* Image Placement Utilities */
.prod-img {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.prod-placeholder-emoji {
    font-size: 2.5rem;
}

/* Floating Actions */
.prod-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background: #0b6476; /* Bazario Primary Teal */
    color: white;
    padding: 4px 10px;
    font-size: 0.75rem;
    font-weight: 700;
    border-radius: 20px;
    text-transform: uppercase;
}

.prod-wish-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    background: white;
    border: none;
    border-radius: 50%;
    width: 34px;
    height: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    color: #888;
    transition: all 0.2s ease;
}

.prod-wish-btn:hover {
    color: #e74c3c;
    transform: scale(1.1);
}

/* Detail Formats */
.prod-body {
    padding: 16px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.prod-vendor {
    font-size: 0.75rem;
    color: #ff7a00; /* Bazario Accent Orange */
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 4px;
}

.prod-name {
    font-size: 0.95rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    line-height: 1.4;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.prod-stars {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 14px;
}

.stars {
    color: #ffcc00;
    font-size: 0.85rem;
}

.rating-cnt {
    font-size: 0.75rem;
    color: #888;
}

/* Call to Action Positioning */
.prod-price-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto; /* Pushes action block perfectly to bottom */
}

.prod-price {
    font-size: 1.15rem;
    font-weight: 700;
    color: #111;
}

.add-to-cart-btn {
    background: #0b6476;
    color: white;
    border: none;
    padding: 6px 14px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 0.85rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: background-color 0.2s;
}

.add-to-cart-btn:hover {
    background: #ff7a00;
}

.heart-icon, .cart-icon {
    width: 16px;
    height: 16px;
}
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2 font-weight-bold text-dark m-0">New Arrivals</h1>
        <a href="{{ route('categories') }}" class="btn btn-outline-secondary btn-sm">View All Products</a>
    </div>

    <!-- Product Grid System -->
    <div class="trending-grid">
        @foreach($newArrivals as $product)

        <div class="prod-card">
            <!-- Product Image Section -->
            <div class="prod-img" style="background:#fdf0e0; height:180px;">
                <span class="prod-badge badge-top">Top</span>

                <!-- Wishlist Button Form -->
                <form action="" method="POST" class="wishlist-form">
                    @csrf
                    <button type="submit" class="prod-wish-btn" title="Add to Wishlist">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="heart-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </button>
                </form>

                <span class="prod-placeholder-emoji">☕</span>
            </div>

            <!-- Product Details Section -->
            <div class="prod-body">
                <div class="prod-vendor">{{ $product->shop->name ?? 'Global Vendor' }}</div>
                <h3 class="prod-name" title="{{ $product->name }}">{{ $product->name }}</h3>

                <div class="prod-stars">
                    <span class="stars">★★★★★</span>
                    <span class="rating-cnt">(731)</span>
                </div>

                <div class="prod-price-row">
                    <span class="prod-price">${{ number_format($product->price, 2) }}</span>

                    <!-- Add to Cart Button Form -->
                    <form action="{{ route('cart.add',$product->id) }}" method="POST" class="m-0">
                        @csrf
                        <input type="hidden" value="1" name="quantity">
                        <button type="submit" class="add-to-cart-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="cart-icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
                            </svg>
                            Add
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
@endsection

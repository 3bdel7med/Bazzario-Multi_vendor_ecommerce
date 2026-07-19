@extends('layouts.app')
@section('title')
Categories
@endsection
@section('styles')
<style>
    :root {
    --bz-bg-cream: #FDFBF7; /* The main background color */
    --bz-dark-brown: #2B1810; /* The deep contrast color */
    --bz-accent-yellow: #FFF4D4; /* Summer sale banner color */
    --bz-accent-green: #E2F0EC; /* Vendor spotlight banner color */
}

.bz-font-serif {
    font-family: 'Playfair Display', Georgia, serif; /* Matches "Wear What Moves You" */
}

.bz-category-card {
    border: none;
    background: transparent;
    transition: transform 0.3s ease;
}

.bz-category-card:hover {
    transform: translateY(-5px);
}

.bz-img-wrapper {
    background-color: var(--bz-accent-green); /* Rotate these pastel backgrounds per item */
    border-radius: 24px; /* Matches the deep curvature in image_6924ea.jpg */
    overflow: hidden;
    aspect-ratio: 1 / 1; /* Keeps it perfectly square */
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
@endsection
@section('content')
<section class="container my-5 py-4" style="background-color: var(--bz-bg-cream);">

    <!-- Section Header -->
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <span class="text-uppercase text-muted small fw-bold tracking-wider" style="letter-spacing: 1px;">Discover</span>
            <h2 class="bz-font-serif fw-bold mt-1" style="color: var(--bz-dark-brown); font-size: 2.2rem;">Shop by Category</h2>
        </div>
        <a href="#" class="text-decoration-none fw-semibold pb-1" style="color: var(--bz-dark-brown); border-bottom: 2px solid var(--bz-dark-brown);">
            View All Categories &rarr;
        </a>
    </div>

    <!-- Categories Grid -->
    <div class="row g-4 row-cols-2 row-cols-md-3 row-cols-lg-6 text-center">






        <div class="cat-grid">
            @foreach ($categories as $category)
            <a href="{{ route('category.show',$category->slug) }}">
                 <div class="cat-item" onclick="showModularPage('categories')"><div class="cat-icon" style="background:#e8e4fb">📱</div><div class="cat-label">{{ $category->name }}</div></div>
            </a>
            @endforeach
    </div>



    </div>
    {{ $categories->links() }}
</section>
@endsection

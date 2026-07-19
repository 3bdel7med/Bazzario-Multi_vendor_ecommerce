@extends('layouts.app')
@section('title')Bazario - Your Ultimate Marketplace
@endsection
@section('content')


  <div class="hero">
    <div class="hero-slider anim">
      <div class="slide active slide-s1">
        <div class="slide-geo" style="background:radial-gradient(circle,rgba(99,60,220,0.6),transparent)"></div>
        <div class="slide-inner">
          <span class="slide-tag" style="background:rgba(99,60,220,0.3);color:#c4b5fd;border:1px solid rgba(99,60,220,0.5)">Premium Electronics</span>
          <div class="slide-title">Shop the<br/>Future,<br/>Today</div>
          <p class="slide-sub">1,200+ verified sellers. Top brands at unbeatable prices, delivered to your door.</p>
          <a onclick="showModularPage('flash')" class="slide-cta">Explore Deals →</a>
        </div>
      </div>
      <div class="slide slide-s2">
        <div class="slide-geo" style="background:radial-gradient(circle,rgba(249,115,22,0.5),transparent)"></div>
        <div class="slide-inner">
          <span class="slide-tag" style="background:rgba(249,115,22,0.2);color:#fdba74;border:1px solid rgba(249,115,22,0.4)">Fashion & Style</span>
          <div class="slide-title">Wear<br/>What<br/>Moves You</div>
          <p class="slide-sub">Curated fashion from independent designers and global brands. Free returns always.</p>
          <a onclick="showModularPage('categories')" class="slide-cta">Shop Fashion →</a>
        </div>
      </div>
      <div class="slide slide-s3">
        <div class="slide-geo" style="background:radial-gradient(circle,rgba(74,222,128,0.4),transparent)"></div>
        <div class="slide-inner">
          <span class="slide-tag" style="background:rgba(74,222,128,0.15);color:#4ade80;border:1px solid rgba(74,222,128,0.3)">Home & Living</span>
          <div class="slide-title">Natural<br/>Living<br/>Starts Here</div>
          <p class="slide-sub">Handpicked organic, eco-friendly home goods from trusted independent vendors.</p>
          <a onclick="showModularPage('categories')" class="slide-cta">Discover More →</a>
        </div>
      </div>
      <div class="slider-dots">
        <button class="sdot active" onclick="goSlide(0)"></button>
        <button class="sdot" onclick="goSlide(1)"></button>
        <button class="sdot" onclick="goSlide(2)"></button>
      </div>
      <div class="slider-arrows">
        <button class="sarr" onclick="slidePrev()">‹</button>
        <button class="sarr" onclick="slideNext()">›</button>
      </div>
    </div>
    <div class="hero-sidebar anim" style="animation-delay:0.15s">
      <div class="promo-card promo-a" onclick="showModularPage('flash')">
        <h3>Up to 60% Off<br/>Summer Sale</h3>
        <p>Limited-time offers from top vendors</p>
        <a class="arrow">Shop Sale →</a>
        <div class="promo-icon">☀️</div>
      </div>
      <div class="promo-card promo-b" onclick="showModularPage('vendors')">
        <h3>New Vendor<br/>Spotlight</h3>
        <p>Discover fresh brands joining Bazario</p>
        <a class="arrow">Explore →</a>
        <div class="promo-icon">🌿</div>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="section-header">
      <div class="section-title">Shop by Category</div>
      <a onclick="showModularPage('categories')" class="section-link" style="cursor:pointer">View All →</a>
    </div>
    <div class="cat-grid">
      <div class="cat-item" onclick="showModularPage('categories')"><div class="cat-icon" style="background:#e8e4fb">📱</div><div class="cat-label">Electronics</div></div>
      <div class="cat-item" onclick="showModularPage('categories')"><div class="cat-icon" style="background:#fde8d8">👗</div><div class="cat-label">Fashion</div></div>
      <div class="cat-item" onclick="showModularPage('categories')"><div class="cat-icon" style="background:#e8f4e8">🪴</div><div class="cat-label">Home & Garden</div></div>
      <div class="cat-item" onclick="showModularPage('categories')"><div class="cat-icon" style="background:#fdf0e0">💄</div><div class="cat-label">Beauty</div></div>
      <div class="cat-item" onclick="showModularPage('categories')"><div class="cat-icon" style="background:#e0f0fd">📚</div><div class="cat-label">Books</div></div>
      <div class="cat-item" onclick="showModularPage('categories')"><div class="cat-icon" style="background:#fde8f0">🎮</div><div class="cat-label">Gaming</div></div>
      <div class="cat-item" onclick="showModularPage('categories')"><div class="cat-icon" style="background:#e8fdf0">🥗</div><div class="cat-label">Food & Health</div></div>
      <div class="cat-item" onclick="showModularPage('categories')"><div class="cat-icon" style="background:#f0e8fd">🐾</div><div class="cat-label">Pet Supplies</div></div>
    </div>
  </div>

  <div class="divider"></div>

  <div class="flash-banner" onclick="showModularPage('flash')" style="cursor:pointer">
    <div class="flash-inner">
      <span class="flash-label">⚡ Flash Sale</span>
      <span class="flash-text">Today's lightning deals — limited stock, huge savings! Click to explore.</span>
      <div class="countdown">
        <div class="cblock"><span class="num" id="ch">05</span><span class="lbl">Hrs</span></div>
        <span class="csep">:</span>
        <div class="cblock"><span class="num" id="cm">48</span><span class="lbl">Min</span></div>
        <span class="csep">:</span>
        <div class="cblock"><span class="num" id="cs">33</span><span class="lbl">Sec</span></div>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="section-header">
      <div class="section-title">Featured Products</div>
      <a onclick="showModularPage('arrivals')" class="section-link" style="cursor:pointer">View All →</a>
    </div>
    <div class="tabs">
      <button class="tab active">All</button>
      <button class="tab">Electronics</button>
      <button class="tab">Fashion</button>
      <button class="tab">Home</button>
      <button class="tab">Beauty</button>
    </div>


<!-- FEATURED PRODUCTS -->

    <div class="prod-grid">

        @foreach($latestProducts as $product)

        <div class="prod-card">
            <!-- Product Image Section -->
            <div class="prod-img" style="background:#fdf0e0; height:180px;">
                <span class="prod-badge badge-top">Top</span>



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
                        <div class="icon-btn" onclick="showModularPage('cart')"> 🛒</div>




                        </button>
                    </form>
                                    <!-- Wishlist Button Form -->
                <form action="{{ route('addToWishlist',$product->id) }}" method="POST" class="wishlist-form">
                    @csrf
                    <button type="submit" class="prod-wish-btn" title="Add to Wishlist">
                      <div class="icon-btn" onclick="showToastCustom('🤍product added to Wishlist successfuly')">🤍</div>

                    </button>
                </form>
                </div>
            </div>
        </div>

        @endforeach
    </div>

    </div>
  </div>

  <div class="vendor-section">
    <div class="vendor-inner">
      <div class="section-header">
        <div class="section-title">Top Vendors</div>
        <a onclick="showModularPage('vendors')" class="section-link" style="cursor:pointer">Meet All Vendors →</a>
      </div>
      <div class="vendor-grid">
        <div class="vendor-card" onclick="openChatWithVendor('SoundWave', '🎧')"><span class="vendor-badge verified">Verified</span><div class="vendor-avatar" style="background:#e8e4fb">🎧</div><div class="vendor-name">SoundWave</div><div class="vendor-cat">Electronics · Audio</div><div class="vendor-stats"><div class="vstat"><strong>4.9 ★</strong>Rating</div><div class="vstat"><strong>12.4k</strong>Sales</div><div class="vstat"><strong>248</strong>Products</div></div><small class="text-primary mt-2 d-block">💬 Click to Chat</small></div>
        <div class="vendor-card" onclick="openChatWithVendor('LoomThread', '👗')"><span class="vendor-badge verified">Verified</span><div class="vendor-avatar" style="background:#fde8d8">👗</div><div class="vendor-name">LoomThread</div><div class="vendor-cat">Fashion · Apparel</div><div class="vendor-stats"><div class="vstat"><strong>4.8 ★</strong>Rating</div><div class="vstat"><strong>8.7k</strong>Sales</div><div class="vstat"><strong>183</strong>Products</div></div><small class="text-primary mt-2 d-block">💬 Click to Chat</small></div>
        <div class="vendor-card" onclick="openChatWithVendor('GreenNest', '🌿')"><span class="vendor-badge verified">Verified</span><div class="vendor-avatar" style="background:#e8f4e8">🌿</div><div class="vendor-name">GreenNest</div><div class="vendor-cat">Home · Organic</div><div class="vendor-stats"><div class="vstat"><strong>4.9 ★</strong>Rating</div><div class="vstat"><strong>6.2k</strong>Sales</div><div class="vstat"><strong>94</strong>Products</div></div><small class="text-primary mt-2 d-block">💬 Click to Chat</small></div>
        <div class="vendor-card" onclick="openChatWithVendor('GlowLab', '💄')"><span class="vendor-badge verified">Verified</span><div class="vendor-avatar" style="background:#fdf0e0">💄</div><div class="vendor-name">GlowLab</div><div class="vendor-cat">Beauty · Skincare</div><div class="vendor-stats"><div class="vstat"><strong>4.7 ★</strong>Rating</div><div class="vstat"><strong>21k</strong>Sales</div><div class="vstat"><strong>67</strong>Products</div></div><small class="text-primary mt-2 d-block">💬 Click to Chat</small></div>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="section-header">
      <div class="section-title">Trending Now</div>
    </div>
    <button class="filter-toggle" onclick="toggleFilter()">🎛 Filters <span id="filterArrow">▾</span></button>
    <div class="three-col">
      <div class="filter-sidebar" id="filterSidebar">
        <div class="filter-title">Filters</div>
        <div class="filter-group">
          <div class="filter-group-title">Category</div>
          <div class="filter-item"><div class="check checked">✓</div>All Categories</div>
          <div class="filter-item"><div class="check"></div>Electronics</div>
          <div class="filter-item"><div class="check"></div>Fashion</div>
          <div class="filter-item"><div class="check"></div>Home & Garden</div>
          <div class="filter-item"><div class="check"></div>Beauty</div>
        </div>
        <div class="filter-group">
          <div class="filter-group-title">Price Range</div>
          <div class="price-range">
            <input type="text" value="$0"/>
            <span style="color:var(--muted);font-size:13px">—</span>
            <input type="text" value="$500"/>
          </div>
        </div>
        <button class="btn-primary" style="width:100%;justify-content:center" onclick="showToastCustom('Filters Implemented!')">Apply Filters</button>
      </div>
      <div class="trending-grid">
        <div class="prod-card"><div class="prod-img" style="background:#fdf0e0;height:150px"><span class="prod-badge badge-top">Top</span><div class="prod-wish">🤍</div>☕</div><div class="prod-body"><div class="prod-vendor">BrewCraft</div><div class="prod-name">Ceramic Pour-Over Set</div><div class="prod-stars"><span class="stars">★★★★★</span><span class="rating-cnt">(731)</span></div><div class="prod-price-row"><span class="prod-price">$38</span></div></div></div>
        <div class="prod-card"><div class="prod-img" style="background:#eef8ef;height:150px"><span class="prod-badge badge-new">New</span><div class="prod-wish">🤍</div>🌱</div><div class="prod-body"><div class="prod-vendor">GreenNest</div><div class="prod-name">Indoor Plant Starter Kit</div><div class="prod-stars"><span class="stars">★★★★☆</span><span class="rating-cnt">(204)</span></div><div class="prod-price-row"><span class="prod-price">$29</span></div></div></div>
        <div class="prod-card"><div class="prod-img" style="background:#f0eeff;height:150px"><span class="prod-badge badge-sale">-30%</span><div class="prod-wish">🤍</div>🎮</div><div class="prod-body"><div class="prod-vendor">PixelForge</div><div class="prod-name">Wireless Gaming Mouse</div><div class="prod-stars"><span class="stars">★★★★★</span><span class="rating-cnt">(1,590)</span></div><div class="prod-price-row"><span class="prod-price">$49</span><span class="prod-old">$70</span></div></div></div>
      </div>
    </div>
  </div>


</div>
@endsection

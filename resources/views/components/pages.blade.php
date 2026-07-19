<style>
  :root {
    --primary: #1a1a2e;
    --accent: #e94560;
    --accent2: #f5a623;
    --gold: #c9a84c;
    --surface: #f7f5f0;
    --card-bg: #ffffff;
    --text-main: #1a1a2e;
    --text-muted: #6b7280;
    --border: #e8e4dc;
    --success: #10b981;
    --tag-bg: #fff8ee;
    --tag-border: #f5d78e;
    --nav-h: 64px;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--surface);
    color: var(--text-main);
    min-height: 100vh;
  }

  /* BOTTOM NAV */
  .bottom-nav {
    position: fixed;
    bottom: 0; left: 0; right: 0;
    background: #ffffff;
    border-top: 1px solid var(--border);
    display: flex;
    z-index: 1000;
    box-shadow: 0 -4px 20px rgba(0,0,0,0.08);
  }
  .bn-item {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 10px 4px 8px;
    cursor: pointer;
    transition: all 0.2s;
    gap: 3px;
    border: none;
    background: none;
    color: var(--text-muted);
    font-size: 10px;
    font-family: 'DM Sans', sans-serif;
    font-weight: 500;
    letter-spacing: 0.3px;
    text-transform: uppercase;
    position: relative;
  }
  .bn-item.active { color: var(--accent); }
  .bn-item.active .bn-icon { background: #fef2f2; border-radius: 12px; }
  .bn-icon {
    font-size: 22px;
    width: 36px; height: 30px;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.2s;
  }
  .bn-badge {
    position: absolute;
    top: 6px; right: calc(50% - 22px);
    background: var(--accent);
    color: white;
    font-size: 9px;
    font-weight: 700;
    width: 16px; height: 16px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    border: 2px solid white;
  }
  .bn-item:hover { color: var(--accent); }

  /* PAGE WRAPPER */
  .page { display: none; padding-bottom: calc(var(--nav-h) + 24px); }
  .page.active { display: block; }

  /* SECTION HEADER */
  .section-header {
    display: flex; align-items: center; justify-content: space-between;
    padding: 0 20px 16px;
  }
  .section-title {
    font-family: 'Playfair Display', serif;
    font-size: 22px; font-weight: 700;
    color: var(--text-main);
  }
  .section-title span { color: var(--accent); }
  .see-all {
    font-size: 13px; color: var(--accent);
    font-weight: 600; cursor: pointer;
    background: none; border: none;
    text-decoration: none;
  }

  /* PAGE HERO */
  .page-hero {
    background: linear-gradient(135deg, var(--primary) 0%, #16213e 100%);
    color: white;
    padding: 28px 20px 24px;
    margin-bottom: 24px;
    position: relative;
    overflow: hidden;
  }
  .page-hero::after {
    content: '';
    position: absolute;
    top: -40px; right: -40px;
    width: 160px; height: 160px;
    border-radius: 50%;
    background: rgba(233,69,96,0.15);
    pointer-events: none;
  }
  .page-hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: 26px; font-weight: 700;
    margin-bottom: 6px;
  }
  .page-hero p { font-size: 14px; opacity: 0.75; }

  /* PRODUCT CARD */
  .product-card {
    background: var(--card-bg);
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid var(--border);
    transition: transform 0.2s, box-shadow 0.2s;
    cursor: pointer;
    height: 100%;
  }
  .product-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(0,0,0,0.1);
  }
  .product-img {
    width: 100%; aspect-ratio: 1/1;
    object-fit: cover;
    background: #f0ece4;
    display: flex; align-items: center; justify-content: center;
    font-size: 48px;
    position: relative;
  }
  .product-img-placeholder {
    width: 100%; aspect-ratio: 1/1;
    background: linear-gradient(135deg, #f0ece4 0%, #e8e2d8 100%);
    display: flex; align-items: center; justify-content: center;
    font-size: 48px;
  }
  .product-body { padding: 14px; }
  .product-vendor {
    font-size: 11px; color: var(--text-muted); font-weight: 500;
    text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px;
  }
  .product-name {
    font-size: 14px; font-weight: 600; color: var(--text-main);
    margin-bottom: 8px; line-height: 1.4;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .product-price { font-size: 18px; font-weight: 700; color: var(--accent); }
  .product-price-old {
    font-size: 13px; color: var(--text-muted);
    text-decoration: line-through; margin-left: 6px;
  }
  .product-stars { color: var(--gold); font-size: 12px; margin-bottom: 4px; }
  .badge-new {
    position: absolute; top: 10px; left: 10px;
    background: var(--accent); color: white;
    font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 20px;
  }
  .badge-sale {
    position: absolute; top: 10px; left: 10px;
    background: var(--success); color: white;
    font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 20px;
  }
  .wish-btn {
    position: absolute; top: 10px; right: 10px;
    background: white; border: none; width: 32px; height: 32px;
    border-radius: 50%; display: flex; align-items: center; justify-content: center;
    font-size: 16px; cursor: pointer; box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: all 0.2s;
  }
  .wish-btn:hover { background: #fef2f2; }
  .btn-cart {
    background: var(--primary); color: white;
    border: none; border-radius: 10px; padding: 8px 0;
    width: 100%; font-size: 13px; font-weight: 600;
    cursor: pointer; transition: background 0.2s; margin-top: 10px;
  }
  .btn-cart:hover { background: var(--accent); }

  /* FILTER PILLS */
  .filter-scroll {
    display: flex; gap: 10px; overflow-x: auto;
    padding: 0 20px 20px;
    scrollbar-width: none; -webkit-overflow-scrolling: touch;
  }
  .filter-scroll::-webkit-scrollbar { display: none; }
  .filter-pill {
    background: white; border: 1.5px solid var(--border);
    border-radius: 20px; padding: 7px 18px;
    font-size: 13px; font-weight: 500; white-space: nowrap;
    cursor: pointer; transition: all 0.2s; color: var(--text-muted);
  }
  .filter-pill.active, .filter-pill:hover {
    background: var(--primary); color: white; border-color: var(--primary);
  }

  /* CATEGORY CARD */
  .category-card {
    background: white; border-radius: 20px;
    border: 1px solid var(--border);
    padding: 24px 16px; text-align: center;
    cursor: pointer; transition: all 0.2s;
    height: 100%;
  }
  .category-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(0,0,0,0.08); }
  .cat-icon {
    width: 64px; height: 64px; border-radius: 16px;
    display: flex; align-items: center; justify-content: center;
    font-size: 30px; margin: 0 auto 14px;
  }
  .cat-name { font-size: 15px; font-weight: 600; margin-bottom: 4px; }
  .cat-count { font-size: 12px; color: var(--text-muted); }

  /* BLOG CARD */
  .blog-card {
    background: white; border-radius: 16px;
    border: 1px solid var(--border);
    overflow: hidden; cursor: pointer;
    transition: all 0.2s; height: 100%;
  }
  .blog-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(0,0,0,0.1); }
  .blog-img {
    width: 100%; height: 180px;
    background: linear-gradient(135deg, #1a1a2e, #16213e);
    display: flex; align-items: center; justify-content: center;
    font-size: 60px;
    position: relative;
  }
  .blog-tag {
    position: absolute; bottom: 12px; left: 12px;
    background: var(--accent); color: white;
    font-size: 11px; font-weight: 700; padding: 4px 12px; border-radius: 20px;
  }
  .blog-body { padding: 16px; }
  .blog-meta { font-size: 12px; color: var(--text-muted); margin-bottom: 8px; }
  .blog-title {
    font-family: 'Playfair Display', serif;
    font-size: 17px; font-weight: 600; line-height: 1.4; margin-bottom: 10px;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .blog-excerpt { font-size: 13px; color: var(--text-muted); line-height: 1.6; }

  /* VENDOR CARD */
  .vendor-card {
    background: white; border-radius: 20px;
    border: 1px solid var(--border); overflow: hidden;
    cursor: pointer; transition: all 0.2s;
  }
  .vendor-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(0,0,0,0.1); }
  .vendor-banner {
    height: 90px;
    display: flex; align-items: flex-end; padding: 0 16px 12px;
    position: relative;
  }
  .vendor-logo {
    width: 52px; height: 52px; border-radius: 14px;
    background: white; border: 3px solid white;
    display: flex; align-items: center; justify-content: center;
    font-size: 24px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    position: absolute; bottom: -20px; left: 20px;
  }
  .vendor-body { padding: 28px 16px 16px; }
  .vendor-name { font-size: 16px; font-weight: 700; margin-bottom: 2px; }
  .vendor-cat { font-size: 12px; color: var(--text-muted); margin-bottom: 12px; }
  .vendor-stats { display: flex; gap: 20px; margin-bottom: 14px; }
  .v-stat { text-align: center; }
  .v-stat-val { font-size: 16px; font-weight: 700; }
  .v-stat-label { font-size: 11px; color: var(--text-muted); }
  .btn-visit {
    background: var(--primary); color: white;
    border: none; border-radius: 10px; padding: 9px 0;
    width: 100%; font-size: 13px; font-weight: 600; cursor: pointer;
    transition: background 0.2s;
  }
  .btn-visit:hover { background: var(--accent); }
  .vendor-verified {
    position: absolute; top: 10px; right: 10px;
    background: rgba(16,185,129,0.15); color: var(--success);
    font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 20px;
    backdrop-filter: blur(4px);
  }

  /* CART */
  .cart-item {
    background: white; border-radius: 16px;
    border: 1px solid var(--border); padding: 16px;
    margin-bottom: 12px;
  }
  .cart-item-img {
    width: 72px; height: 72px; border-radius: 12px;
    background: linear-gradient(135deg, #f0ece4, #e8e2d8);
    display: flex; align-items: center; justify-content: center;
    font-size: 32px; flex-shrink: 0;
  }
  .cart-item-name { font-size: 15px; font-weight: 600; margin-bottom: 4px; }
  .cart-item-vendor { font-size: 12px; color: var(--text-muted); margin-bottom: 8px; }
  .cart-item-price { font-size: 17px; font-weight: 700; color: var(--accent); }
  .qty-ctrl {
    display: flex; align-items: center; gap: 8px;
    background: #f7f5f0; border-radius: 10px; padding: 4px 6px;
  }
  .qty-btn {
    width: 28px; height: 28px; border-radius: 8px;
    border: none; background: white; font-size: 18px; font-weight: 700;
    cursor: pointer; display: flex; align-items: center; justify-content: center;
    color: var(--primary); box-shadow: 0 1px 4px rgba(0,0,0,0.08);
    transition: all 0.15s;
  }
  .qty-btn:hover { background: var(--accent); color: white; }
  .qty-num { font-size: 15px; font-weight: 700; min-width: 20px; text-align: center; }
  .cart-remove {
    background: none; border: none; color: var(--text-muted);
    font-size: 18px; cursor: pointer; padding: 4px; transition: color 0.15s;
  }
  .cart-remove:hover { color: var(--accent); }
  .cart-summary {
    background: white; border-radius: 20px;
    border: 1px solid var(--border); padding: 20px; margin-top: 8px;
  }
  .summary-row {
    display: flex; justify-content: space-between;
    font-size: 14px; padding: 8px 0;
    border-bottom: 1px solid var(--border);
    color: var(--text-muted);
  }
  .summary-row:last-of-type { border: none; }
  .summary-total {
    display: flex; justify-content: space-between;
    font-size: 18px; font-weight: 700; padding: 12px 0 0;
    color: var(--text-main);
  }
  .btn-checkout {
    background: var(--accent); color: white;
    border: none; border-radius: 14px; padding: 15px 0;
    width: 100%; font-size: 16px; font-weight: 700;
    cursor: pointer; margin-top: 16px; transition: all 0.2s;
    letter-spacing: 0.3px;
  }
  .btn-checkout:hover { background: #c73050; transform: scale(0.99); }

  /* FLASH DEALS */
  .flash-hero {
    background: linear-gradient(135deg, #e94560 0%, #c73050 100%);
    color: white; padding: 28px 20px 24px;
    margin-bottom: 24px; position: relative; overflow: hidden;
  }
  .flash-hero::before {
    content: '⚡';
    position: absolute; right: 20px; top: 50%; transform: translateY(-50%);
    font-size: 80px; opacity: 0.15;
  }
  .flash-hero h1 { font-family: 'Playfair Display', serif; font-size: 26px; font-weight: 700; margin-bottom: 6px; }
  .flash-hero p { font-size: 13px; opacity: 0.85; }
  .countdown {
    display: flex; gap: 8px; margin-top: 16px;
  }
  .cd-box {
    background: rgba(255,255,255,0.2); border-radius: 10px;
    padding: 8px 14px; text-align: center; backdrop-filter: blur(4px);
    min-width: 56px;
  }
  .cd-num { font-size: 22px; font-weight: 700; line-height: 1; }
  .cd-label { font-size: 10px; opacity: 0.8; text-transform: uppercase; letter-spacing: 0.5px; }
  .progress-bar-custom {
    background: #e8e4dc; border-radius: 20px; height: 8px; overflow: hidden;
    margin-top: 8px;
  }
  .progress-fill {
    height: 100%; border-radius: 20px;
    background: linear-gradient(90deg, var(--accent), var(--accent2));
    transition: width 0.3s;
  }
  .sold-text { font-size: 11px; color: var(--text-muted); margin-top: 4px; }
  .flash-badge {
    position: absolute; top: 10px; left: 10px;
    background: linear-gradient(135deg, #e94560, #c73050);
    color: white; font-size: 11px; font-weight: 700;
    padding: 3px 10px; border-radius: 20px;
  }

  /* ORDERS */
  .order-card {
    background: white; border-radius: 20px;
    border: 1px solid var(--border); padding: 20px; margin-bottom: 14px;
  }
  .order-header {
    display: flex; justify-content: space-between; align-items: flex-start;
    margin-bottom: 14px;
  }
  .order-id { font-size: 13px; font-weight: 700; color: var(--primary); }
  .order-date { font-size: 12px; color: var(--text-muted); margin-top: 2px; }
  .order-status {
    font-size: 12px; font-weight: 700; padding: 5px 14px; border-radius: 20px;
  }
  .status-delivered { background: #ecfdf5; color: var(--success); }
  .status-processing { background: #fff8ee; color: #d97706; }
  .status-shipped { background: #eff6ff; color: #2563eb; }
  .status-cancelled { background: #fef2f2; color: var(--accent); }
  .order-items { display: flex; gap: 10px; margin-bottom: 14px; }
  .order-item-thumb {
    width: 56px; height: 56px; border-radius: 12px;
    background: #f0ece4; display: flex; align-items: center; justify-content: center;
    font-size: 24px; flex-shrink: 0;
  }
  .order-divider { border: none; border-top: 1px solid var(--border); margin: 14px 0; }
  .order-footer { display: flex; justify-content: space-between; align-items: center; }
  .order-total-label { font-size: 13px; color: var(--text-muted); }
  .order-total-val { font-size: 18px; font-weight: 700; color: var(--text-main); }
  .btn-reorder {
    background: var(--primary); color: white;
    border: none; border-radius: 10px; padding: 8px 20px;
    font-size: 13px; font-weight: 600; cursor: pointer; transition: background 0.2s;
  }
  .btn-reorder:hover { background: var(--accent); }

  /* ORDER TABS */
  .order-tabs {
    display: flex; gap: 0; background: white;
    border-bottom: 1px solid var(--border); margin-bottom: 20px;
    overflow-x: auto; scrollbar-width: none;
  }
  .order-tabs::-webkit-scrollbar { display: none; }
  .order-tab {
    padding: 12px 20px; font-size: 13px; font-weight: 600;
    cursor: pointer; white-space: nowrap; color: var(--text-muted);
    border-bottom: 2px solid transparent; transition: all 0.2s;
  }
  .order-tab.active { color: var(--accent); border-bottom-color: var(--accent); }

  /* EMPTY STATE */
  .empty-state { text-align: center; padding: 60px 20px; }
  .empty-icon { font-size: 64px; margin-bottom: 16px; display: block; }
  .empty-title { font-family: 'Playfair Display', serif; font-size: 22px; font-weight: 700; margin-bottom: 8px; }
  .empty-sub { font-size: 14px; color: var(--text-muted); margin-bottom: 24px; }
  .btn-empty { background: var(--accent); color: white; border: none; border-radius: 12px; padding: 12px 28px; font-size: 14px; font-weight: 700; cursor: pointer; }

  /* TOAST */
  .toast-container {
    position: fixed; top: 20px; right: 20px; z-index: 9999;
    display: flex; flex-direction: column; gap: 8px;
  }
  .toast {
    background: var(--primary); color: white; padding: 12px 20px;
    border-radius: 12px; font-size: 14px; font-weight: 500;
    box-shadow: 0 8px 24px rgba(0,0,0,0.2); animation: slideIn 0.3s ease;
    display: flex; align-items: center; gap: 10px;
  }
  @keyframes slideIn {
    from { transform: translateX(100px); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
  }
  @keyframes slideOut {
    from { transform: translateX(0); opacity: 1; }
    to { transform: translateX(100px); opacity: 0; }
  }

  /* MISC */
  .px-20 { padding-left: 20px; padding-right: 20px; }
  .pt-24 { padding-top: 24px; }
  .search-bar {
    margin: 0 20px 20px;
    background: white; border-radius: 14px;
    border: 1.5px solid var(--border);
    display: flex; align-items: center; gap: 10px; padding: 11px 16px;
  }
  .search-bar input {
    border: none; outline: none; font-family: 'DM Sans', sans-serif;
    font-size: 14px; width: 100%; background: transparent; color: var(--text-main);
  }
  .search-bar input::placeholder { color: var(--text-muted); }

  /* Ratings */
  .rating-stars { color: var(--gold); }
</style>
</head>
<body>

<div class="toast-container" id="toastContainer"></div>

<!-- ===================== PAGE: NEW ARRIVALS ===================== -->
<div class="page active" id="page-arrivals">
  <div class="page-hero">
    <h1>✨ New Arrivals</h1>
    <p>Fresh drops from top vendors — updated daily</p>
  </div>
  <div class="search-bar">
    <span style="font-size:18px; color:var(--text-muted);">🔍</span>
    <input type="text" placeholder="Search new arrivals…" id="arrivalSearch" oninput="filterArrivals()">
  </div>
  <div class="filter-scroll">
    <div class="filter-pill active" onclick="setFilter(this,'arrivals')">All</div>
    <div class="filter-pill" onclick="setFilter(this,'arrivals')">Electronics</div>
    <div class="filter-pill" onclick="setFilter(this,'arrivals')">Fashion</div>
    <div class="filter-pill" onclick="setFilter(this,'arrivals')">Beauty</div>
    <div class="filter-pill" onclick="setFilter(this,'arrivals')">Home</div>
    <div class="filter-pill" onclick="setFilter(this,'arrivals')">Sports</div>
    <div class="filter-pill" onclick="setFilter(this,'arrivals')">Books</div>
  </div>
  <div class="px-20">
    <div class="row g-3" id="arrivalsGrid"></div>
  </div>
</div>

<!-- ===================== PAGE: CATEGORIES ===================== -->
<div class="page" id="page-categories">
  <div class="page-hero">
    <h1>🗂️ Categories</h1>
    <p>Browse our curated collection of product categories</p>
  </div>
  <div class="search-bar">
    <span style="font-size:18px; color:var(--text-muted);">🔍</span>
    <input type="text" placeholder="Search categories…">
  </div>
  <div class="px-20">
    <div class="row g-3" id="categoriesGrid"></div>
  </div>
</div>

<!-- ===================== PAGE: BLOG ===================== -->
<div class="page" id="page-blog">
  <div class="page-hero">
    <h1>📝 The Journal</h1>
    <p>Trends, tips & stories from our community</p>
  </div>
  <div class="filter-scroll">
    <div class="filter-pill active" onclick="setFilter(this,'blog')">All Posts</div>
    <div class="filter-pill" onclick="setFilter(this,'blog')">Trends</div>
    <div class="filter-pill" onclick="setFilter(this,'blog')">Reviews</div>
    <div class="filter-pill" onclick="setFilter(this,'blog')">Tips & How-to</div>
    <div class="filter-pill" onclick="setFilter(this,'blog')">Brand Spotlight</div>
  </div>
  <div class="px-20">
    <div class="row g-3" id="blogGrid"></div>
  </div>
</div>

<!-- ===================== PAGE: VENDORS ===================== -->
<div class="page" id="page-vendors">
  <div class="page-hero">
    <h1>🏪 Our Vendors</h1>
    <p>Trusted sellers with thousands of verified products</p>
  </div>
  <div class="search-bar">
    <span style="font-size:18px; color:var(--text-muted);">🔍</span>
    <input type="text" placeholder="Search vendors…">
  </div>
  <div class="filter-scroll">
    <div class="filter-pill active" onclick="setFilter(this,'vendors')">All</div>
    <div class="filter-pill" onclick="setFilter(this,'vendors')">Top Rated</div>
    <div class="filter-pill" onclick="setFilter(this,'vendors')">New</div>
    <div class="filter-pill" onclick="setFilter(this,'vendors')">Verified</div>
    <div class="filter-pill" onclick="setFilter(this,'vendors')">International</div>
  </div>
  <div class="px-20">
    <div class="row g-3" id="vendorsGrid"></div>
  </div>
</div>

<!-- ===================== PAGE: MY CART ===================== -->
<div class="page" id="page-cart">
  <div class="page-hero">
    <h1>🛒 My Cart</h1>
    <p id="cart-subtitle">You have <b id="cart-count-hero">0</b> items in your cart</p>
  </div>
  <div class="px-20" id="cartContent"></div>
</div>

<!-- ===================== PAGE: FLASH DEALS ===================== -->
<div class="page" id="page-flash">
  <div class="flash-hero">
    <h1>⚡ Flash Deals</h1>
    <p>Limited time offers — don't miss out!</p>
    <div class="countdown">
      <div class="cd-box"><div class="cd-num" id="cd-h">04</div><div class="cd-label">Hrs</div></div>
      <div class="cd-box"><div class="cd-num" id="cd-m">32</div><div class="cd-label">Min</div></div>
      <div class="cd-box"><div class="cd-num" id="cd-s">00</div><div class="cd-label">Sec</div></div>
    </div>
  </div>
  <div class="px-20">
    <div class="row g-3" id="flashGrid"></div>
  </div>
</div>

<!-- ===================== PAGE: MY ORDERS ===================== -->
<div class="page" id="page-orders">
  <div class="page-hero">
    <h1>📦 My Orders</h1>
    <p>Track and manage all your purchases</p>
  </div>
  <div class="order-tabs">
    <div class="order-tab active" onclick="filterOrders('all',this)">All Orders</div>
    <div class="order-tab" onclick="filterOrders('Processing',this)">Processing</div>
    <div class="order-tab" onclick="filterOrders('Shipped',this)">Shipped</div>
    <div class="order-tab" onclick="filterOrders('Delivered',this)">Delivered</div>
    <div class="order-tab" onclick="filterOrders('Cancelled',this)">Cancelled</div>
  </div>
  <div class="px-20" id="ordersContent"></div>
</div>

<!-- ===================== BOTTOM NAV ===================== -->
<nav class="bottom-nav">
  <button class="bn-item active" onclick="showPage('arrivals',this)">
    <span class="bn-icon">✨</span>New
  </button>
  <button class="bn-item" onclick="showPage('categories',this)">
    <span class="bn-icon">🗂️</span>Categories
  </button>
  <button class="bn-item" onclick="showPage('blog',this)">
    <span class="bn-icon">📝</span>Blog
  </button>
  <button class="bn-item" onclick="showPage('vendors',this)">
    <span class="bn-icon">🏪</span>Vendors
  </button>
  <button class="bn-item" onclick="showPage('cart',this)" id="cartNavBtn">
    <span class="bn-icon">🛒</span>Cart
    <span class="bn-badge" id="cartBadge">0</span>
  </button>
  <button class="bn-item" onclick="showPage('flash',this)">
    <span class="bn-icon">⚡</span>Flash
  </button>
  <button class="bn-item" onclick="showPage('orders',this)">
    <span class="bn-icon">📦</span>Orders
  </button>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ====== STATE ======
let cartItems = [
  { id: 1, name: 'Sony WH-1000XM5 Headphones', vendor: 'TechHub Store', price: 279, qty: 1, icon: '🎧' },
  { id: 2, name: 'Organic Cotton Oversized Tee', vendor: 'StyleCo', price: 45, qty: 2, icon: '👕' },
  { id: 3, name: 'Artisan Ceramic Mug Set', vendor: 'HomeGoods Plus', price: 38, qty: 1, icon: '☕' }
];

// ====== DATA ======
const arrivalsData = [
  { id:1, name:'AirPods Pro 3rd Gen', vendor:'TechHub Store', price:249, old:299, stars:5, icon:'🎵', tag:'Electronics' },
  { id:2, name:'Linen Palazzo Pants', vendor:'Luxe Fashion', price:89, old:120, stars:4, icon:'👗', tag:'Fashion' },
  { id:3, name:'Smart LED Desk Lamp', vendor:'HomeGoods Plus', price:59, old:80, stars:5, icon:'💡', tag:'Home' },
  { id:4, name:'Vitamin C Serum 30ml', vendor:'GlowSkin Beauty', price:35, old:45, stars:4, icon:'✨', tag:'Beauty' },
  { id:5, name:'Yoga Mat Pro 6mm', vendor:'FitZone Sports', price:55, old:75, stars:5, icon:'🧘', tag:'Sports' },
  { id:6, name:'Mechanical Keyboard TKL', vendor:'TechHub Store', price:139, old:180, stars:4, icon:'⌨️', tag:'Electronics' },
  { id:7, name:'Silk Pillowcase Set', vendor:'Luxe Fashion', price:72, old:95, stars:5, icon:'🛏️', tag:'Home' },
  { id:8, name:'Protein Shaker Bottle', vendor:'FitZone Sports', price:22, old:30, stars:4, icon:'🥤', tag:'Sports' }
];

const categoriesData = [
  { name:'Electronics', count:'4,821 items', icon:'📱', color:'#e8f0fe', accent:'#1a73e8' },
  { name:'Fashion', count:'12,340 items', icon:'👗', color:'#fce8f3', accent:'#e94560' },
  { name:'Home & Living', count:'6,520 items', icon:'🏠', color:'#e8f5e9', accent:'#2e7d32' },
  { name:'Beauty', count:'3,890 items', icon:'💄', color:'#fff3e0', accent:'#f57c00' },
  { name:'Sports', count:'5,210 items', icon:'⚽', color:'#e3f2fd', accent:'#1565c0' },
  { name:'Books', count:'8,650 items', icon:'📚', color:'#f3e5f5', accent:'#7b1fa2' },
  { name:'Toys', count:'2,340 items', icon:'🧸', color:'#fff8e1', accent:'#f9a825' },
  { name:'Food & Drinks', count:'1,980 items', icon:'🍎', color:'#e8f5e9', accent:'#388e3c' },
  { name:'Automotive', count:'3,120 items', icon:'🚗', color:'#e0f7fa', accent:'#00838f' },
  { name:'Jewelry', count:'2,780 items', icon:'💎', color:'#fce4ec', accent:'#ad1457' },
  { name:'Health', count:'4,100 items', icon:'💊', color:'#e8f5e9', accent:'#1b5e20' },
  { name:'Stationery', count:'1,560 items', icon:'✏️', color:'#fef9e7', accent:'#c9a84c' }
];

const blogData = [
  { title:'Top 10 Gadgets You Need This Summer 2026', tag:'Trends', date:'May 28, 2026', read:'5 min read', icon:'💻', excerpt:'From AI-powered wearables to ultra-portable chargers, these gadgets are redefining modern life.' },
  { title:'How to Style a Capsule Wardrobe on Any Budget', tag:'Tips & How-to', date:'May 25, 2026', read:'7 min read', icon:'👔', excerpt:'Building a versatile wardrobe doesn\'t have to cost a fortune. Our style experts break it down.' },
  { title:'Vendor Spotlight: GlowSkin Beauty\'s Story', tag:'Brand Spotlight', date:'May 22, 2026', read:'4 min read', icon:'✨', excerpt:'From a small garage lab to one of our top-rated beauty vendors — an inspiring journey.' },
  { title:'Best Smart Home Devices Under $100', tag:'Reviews', date:'May 20, 2026', read:'6 min read', icon:'🏠', excerpt:'We tested 25 smart home gadgets so you don\'t have to. Here are the ones worth buying.' },
  { title:'The Future of Sustainable Shopping', tag:'Trends', date:'May 18, 2026', read:'8 min read', icon:'🌿', excerpt:'Eco-conscious buying is no longer a niche trend. Discover how our vendors are going green.' },
  { title:'Fitness Gear Roundup for Home Workouts', tag:'Reviews', date:'May 15, 2026', read:'5 min read', icon:'💪', excerpt:'Build your perfect home gym with these tried-and-tested products from FitZone Sports.' }
];

const vendorsData = [
  { name:'TechHub Store', cat:'Electronics & Gadgets', products:1240, rating:'4.9', sales:'52K', banner:'#1a1a2e', icon:'💻', verified:true },
  { name:'Luxe Fashion', cat:'Clothing & Accessories', products:3480, rating:'4.8', sales:'98K', banner:'#e94560', icon:'👗', verified:true },
  { name:'HomeGoods Plus', cat:'Home & Living', products:870, rating:'4.7', sales:'31K', banner:'#2e7d32', icon:'🏠', verified:true },
  { name:'GlowSkin Beauty', cat:'Skincare & Cosmetics', products:540, rating:'4.9', sales:'24K', banner:'#ad1457', icon:'💄', verified:true },
  { name:'FitZone Sports', cat:'Sports & Fitness', products:720, rating:'4.6', sales:'18K', banner:'#1565c0', icon:'⚽', verified:false },
  { name:'Artisan Crafts Co.', cat:'Handmade & Unique', products:320, rating:'4.8', sales:'9K', banner:'#c9a84c', icon:'🎨', verified:true }
];

const flashData = [
  { id:101, name:'DJI Mini 4 Drone', vendor:'TechHub Store', price:349, old:599, pct:42, sold:68, icon:'🚁' },
  { id:102, name:'Leather Crossbody Bag', vendor:'Luxe Fashion', price:79, old:160, pct:51, sold:82, icon:'👜' },
  { id:103, name:'Air Fryer 5.5L XL', vendor:'HomeGoods Plus', price:89, old:149, pct:40, sold:55, icon:'🍳' },
  { id:104, name:'Hyaluronic Acid Kit', vendor:'GlowSkin Beauty', price:28, old:60, pct:53, sold:90, icon:'💆' },
  { id:105, name:'Resistance Band Set', vendor:'FitZone Sports', price:19, old:40, pct:52, sold:73, icon:'🏋️' },
  { id:106, name:'Gaming Headset RGB', vendor:'TechHub Store', price:49, old:110, pct:55, sold:61, icon:'🎮' }
];

const ordersData = [
  { id:'#ORD-8821', date:'May 29, 2026', status:'Processing', total:279, items:[{icon:'🎧',name:'Sony WH-1000XM5'},{icon:'📱',name:'Phone Case'}], vendor:'TechHub Store' },
  { id:'#ORD-8745', date:'May 24, 2026', status:'Shipped', total:134, items:[{icon:'👗',name:'Linen Dress'},{icon:'👡',name:'Sandals'}], vendor:'Luxe Fashion' },
  { id:'#ORD-8612', date:'May 18, 2026', status:'Delivered', total:67, items:[{icon:'☕',name:'Ceramic Mug Set'}], vendor:'HomeGoods Plus' },
  { id:'#ORD-8543', date:'May 10, 2026', status:'Delivered', total:198, items:[{icon:'💄',name:'Skincare Set'},{icon:'✨',name:'Serum'}], vendor:'GlowSkin Beauty' },
  { id:'#ORD-8321', date:'Apr 28, 2026', status:'Cancelled', total:55, items:[{icon:'🧘',name:'Yoga Mat'}], vendor:'FitZone Sports' }
];

// ====== NAVIGATION ======
function showPage(name, btn) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.bn-item').forEach(b => b.classList.remove('active'));
  document.getElementById('page-' + name).classList.add('active');
  btn.classList.add('active');
  window.scrollTo(0, 0);
}

function setFilter(el, context) {
  const parent = el.closest('.filter-scroll');
  parent.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
  el.classList.add('active');
}

// ====== RENDER ARRIVALS ======
function renderArrivals(data) {
  const grid = document.getElementById('arrivalsGrid');
  grid.innerHTML = data.map(p => `
    <div class="col-6">
      <div class="product-card">
        <div class="product-img-placeholder" style="position:relative;">
          <span>${p.icon}</span>
          <span class="badge-new">NEW</span>
          <button class="wish-btn">🤍</button>
        </div>
        <div class="product-body">
          <div class="product-vendor">${p.vendor}</div>
          <div class="product-name">${p.name}</div>
          <div class="product-stars">${'★'.repeat(p.stars)}${'☆'.repeat(5-p.stars)}</div>
          <div>
            <span class="product-price">$${p.price}</span>
            <span class="product-price-old">$${p.old}</span>
          </div>
          <button class="btn-cart" onclick="addToCart(${p.id},'${p.name.replace(/'/g,"\\'")}','${p.vendor}',${p.price},'${p.icon}')">Add to Cart</button>
        </div>
      </div>
    </div>
  `).join('');
}

function filterArrivals() {
  const q = document.getElementById('arrivalSearch').value.toLowerCase();
  const filtered = arrivalsData.filter(p => p.name.toLowerCase().includes(q) || p.vendor.toLowerCase().includes(q));
  renderArrivals(filtered);
}

// ====== RENDER CATEGORIES ======
function renderCategories() {
  const grid = document.getElementById('categoriesGrid');
  grid.innerHTML = categoriesData.map(c => `
    <div class="col-6 col-md-4">
      <div class="category-card" onclick="showToast('Browsing ${c.name}')">
        <div class="cat-icon" style="background:${c.color};"><span style="font-size:28px">${c.icon}</span></div>
        <div class="cat-name">${c.name}</div>
        <div class="cat-count">${c.count}</div>
      </div>
    </div>
  `).join('');
}

// ====== RENDER BLOG ======
function renderBlog() {
  const grid = document.getElementById('blogGrid');
  grid.innerHTML = blogData.map(b => `
    <div class="col-12 col-md-6">
      <div class="blog-card">
        <div class="blog-img">
          <span>${b.icon}</span>
          <span class="blog-tag">${b.tag}</span>
        </div>
        <div class="blog-body">
          <div class="blog-meta">${b.date} · ${b.read}</div>
          <div class="blog-title">${b.title}</div>
          <div class="blog-excerpt">${b.excerpt}</div>
          <div style="margin-top:12px">
            <button style="background:none;border:none;color:var(--accent);font-weight:700;font-size:13px;cursor:pointer;padding:0" onclick="showToast('Opening article...')">Read more →</button>
          </div>
        </div>
      </div>
    </div>
  `).join('');
}

// ====== RENDER VENDORS ======
function renderVendors() {
  const grid = document.getElementById('vendorsGrid');
  grid.innerHTML = vendorsData.map(v => `
    <div class="col-12 col-md-6">
      <div class="vendor-card">
        <div class="vendor-banner" style="background:${v.banner}; background:linear-gradient(135deg,${v.banner}cc,${v.banner}99);">
          ${v.verified ? '<span class="vendor-verified">✓ Verified</span>' : ''}
        </div>
        <div class="vendor-logo">${v.icon}</div>
        <div class="vendor-body">
          <div class="vendor-name">${v.name}</div>
          <div class="vendor-cat">${v.cat}</div>
          <div class="vendor-stats">
            <div class="v-stat">
              <div class="v-stat-val">${v.products.toLocaleString()}</div>
              <div class="v-stat-label">Products</div>
            </div>
            <div class="v-stat">
              <div class="v-stat-val" style="color:var(--gold);">${v.rating} ★</div>
              <div class="v-stat-label">Rating</div>
            </div>
            <div class="v-stat">
              <div class="v-stat-val">${v.sales}</div>
              <div class="v-stat-label">Sales</div>
            </div>
          </div>
          <button class="btn-visit" onclick="showToast('Visiting ${v.name}')">Visit Store</button>
        </div>
      </div>
    </div>
  `).join('');
}

// ====== RENDER CART ======
function renderCart() {
  const el = document.getElementById('cartContent');
  const total = cartItems.reduce((s, i) => s + i.price * i.qty, 0);
  document.getElementById('cart-count-hero').textContent = cartItems.length;

  if (cartItems.length === 0) {
    el.innerHTML = `
      <div class="empty-state">
        <span class="empty-icon">🛒</span>
        <div class="empty-title">Your cart is empty</div>
        <div class="empty-sub">Add items you love to your cart</div>
        <button class="btn-empty" onclick="showPage('arrivals', document.querySelector('.bn-item'))">Start Shopping</button>
      </div>`;
    return;
  }

  el.innerHTML = `
    ${cartItems.map(item => `
      <div class="cart-item">
        <div class="d-flex gap-3 align-items-start">
          <div class="cart-item-img">${item.icon}</div>
          <div class="flex-grow-1">
            <div class="cart-item-name">${item.name}</div>
            <div class="cart-item-vendor">${item.vendor}</div>
            <div class="d-flex align-items-center justify-content-between mt-2">
              <div class="qty-ctrl">
                <button class="qty-btn" onclick="changeQty(${item.id},-1)">−</button>
                <span class="qty-num">${item.qty}</span>
                <button class="qty-btn" onclick="changeQty(${item.id},1)">+</button>
              </div>
              <div class="cart-item-price">$${(item.price * item.qty).toFixed(2)}</div>
            </div>
          </div>
          <button class="cart-remove" onclick="removeFromCart(${item.id})">✕</button>
        </div>
      </div>
    `).join('')}
    <div class="cart-summary">
      <div class="summary-row"><span>Subtotal (${cartItems.length} items)</span><span>$${total.toFixed(2)}</span></div>
      <div class="summary-row"><span>Shipping</span><span style="color:var(--success)">Free</span></div>
      <div class="summary-row"><span>Tax (8%)</span><span>$${(total*0.08).toFixed(2)}</span></div>
      <div class="summary-total"><span>Total</span><span>$${(total*1.08).toFixed(2)}</span></div>
      <button class="btn-checkout" onclick="showToast('✅ Order placed successfully!')">Checkout Now →</button>
    </div>`;
  updateCartBadge();
}

function changeQty(id, delta) {
  const item = cartItems.find(i => i.id === id);
  if (item) {
    item.qty = Math.max(1, item.qty + delta);
    renderCart();
  }
}

function removeFromCart(id) {
  cartItems = cartItems.filter(i => i.id !== id);
  renderCart();
  showToast('🗑️ Item removed from cart');
}

function addToCart(id, name, vendor, price, icon) {
  const existing = cartItems.find(i => i.id === id);
  if (existing) {
    existing.qty++;
    showToast('🛒 Quantity updated in cart!');
  } else {
    cartItems.push({ id, name, vendor, price, qty: 1, icon });
    showToast('🛒 Added to cart!');
  }
  updateCartBadge();
}

function updateCartBadge() {
  const total = cartItems.reduce((s, i) => s + i.qty, 0);
  document.getElementById('cartBadge').textContent = total;
}

// ====== RENDER FLASH DEALS ======
function renderFlash() {
  const grid = document.getElementById('flashGrid');
  grid.innerHTML = flashData.map(p => `
    <div class="col-6">
      <div class="product-card">
        <div class="product-img-placeholder" style="position:relative;">
          <span>${p.icon}</span>
          <span class="flash-badge">⚡ -${p.pct}%</span>
        </div>
        <div class="product-body">
          <div class="product-vendor">${p.vendor}</div>
          <div class="product-name">${p.name}</div>
          <div>
            <span class="product-price">$${p.price}</span>
            <span class="product-price-old">$${p.old}</span>
          </div>
          <div class="progress-bar-custom">
            <div class="progress-fill" style="width:${p.sold}%"></div>
          </div>
          <div class="sold-text">${p.sold}% sold</div>
          <button class="btn-cart" onclick="addToCart(${p.id},'${p.name.replace(/'/g,"\\'")}','${p.vendor}',${p.price},'${p.icon}')">Grab Deal</button>
        </div>
      </div>
    </div>
  `).join('');
}

// ====== RENDER ORDERS ======
function renderOrders(filter = 'all') {
  const el = document.getElementById('ordersContent');
  const filtered = filter === 'all' ? ordersData : ordersData.filter(o => o.status === filter);

  if (filtered.length === 0) {
    el.innerHTML = `
      <div class="empty-state">
        <span class="empty-icon">📦</span>
        <div class="empty-title">No orders found</div>
        <div class="empty-sub">No ${filter.toLowerCase()} orders at the moment</div>
      </div>`;
    return;
  }

  const statusClass = { Delivered: 'status-delivered', Processing: 'status-processing', Shipped: 'status-shipped', Cancelled: 'status-cancelled' };

  el.innerHTML = filtered.map(o => `
    <div class="order-card">
      <div class="order-header">
        <div>
          <div class="order-id">${o.id}</div>
          <div class="order-date">${o.date} · ${o.vendor}</div>
        </div>
        <span class="order-status ${statusClass[o.status]}">${o.status}</span>
      </div>
      <div class="order-items">
        ${o.items.map(item => `
          <div class="d-flex align-items-center gap-2">
            <div class="order-item-thumb">${item.icon}</div>
            <div style="font-size:13px; font-weight:500; color:var(--text-muted)">${item.name}</div>
          </div>
        `).join('')}
      </div>
      <hr class="order-divider">
      <div class="order-footer">
        <div>
          <div class="order-total-label">Order Total</div>
          <div class="order-total-val">$${o.total.toFixed(2)}</div>
        </div>
        <div class="d-flex gap-2">
          ${o.status === 'Delivered' ? `<button class="btn-reorder" onclick="showToast('✅ Reordering...')">Reorder</button>` : ''}
          <button style="background:none;border:1.5px solid var(--border);border-radius:10px;padding:8px 16px;font-size:13px;font-weight:600;cursor:pointer;color:var(--text-main)" onclick="showToast('📦 Tracking order ${o.id}')">Track</button>
        </div>
      </div>
    </div>
  `).join('');
}

function filterOrders(status, tab) {
  document.querySelectorAll('.order-tab').forEach(t => t.classList.remove('active'));
  tab.classList.add('active');
  renderOrders(status);
}

// ====== COUNTDOWN TIMER ======
let cdSeconds = 4 * 3600 + 32 * 60;
function updateCountdown() {
  cdSeconds--;
  if (cdSeconds < 0) cdSeconds = 4 * 3600;
  const h = Math.floor(cdSeconds / 3600);
  const m = Math.floor((cdSeconds % 3600) / 60);
  const s = cdSeconds % 60;
  document.getElementById('cd-h').textContent = String(h).padStart(2, '0');
  document.getElementById('cd-m').textContent = String(m).padStart(2, '0');
  document.getElementById('cd-s').textContent = String(s).padStart(2, '0');
}
setInterval(updateCountdown, 1000);

// ====== TOAST ======
function showToast(msg) {
  const container = document.getElementById('toastContainer');
  const toast = document.createElement('div');
  toast.className = 'toast';
  toast.innerHTML = msg;
  container.appendChild(toast);
  setTimeout(() => {
    toast.style.animation = 'slideOut 0.3s ease forwards';
    setTimeout(() => toast.remove(), 300);
  }, 2500);
}

// ====== INIT ======
renderArrivals(arrivalsData);
renderCategories();
renderBlog();
renderVendors();
renderCart();
renderFlash();
renderOrders();
updateCartBadge();
</script>

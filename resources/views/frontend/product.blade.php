@extends('layouts.app')
@section('title')
{{ $product->name }}
@endsection
@section('styles')
    <style>
        :root {
            --primary-teal: #0b6476;
            --accent-orange: #ff7a00;
            --bg-light: #f8f9fa;
            --text-dark: #222222;
            --text-muted: #666666;
            --border-color: #eaeaea;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        /* Layout Grid */
        .product-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 2.5rem;
            background: #ffffff;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
        }

        /* Left Column: Images & Meta */
        .image-gallery-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .product-title-section h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-teal);
            margin-bottom: 0.5rem;
        }

        .product-meta-top {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .product-price {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--accent-orange);
        }

        .vendor-link a {
            color: var(--primary-teal);
            text-decoration: underline;
            font-weight: 600;
        }

        .rating-stars {
            color: #ffb800;
        }

        .main-image-box {
            background: #fdf0e0;
            border-radius: 12px;
            height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .main-image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .thumbnail-row {
            display: flex;
            gap: 0.75rem;
        }

        .thumb {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            background: #f0f0f0;
            cursor: pointer;
            border: 2px solid transparent;
            overflow: hidden;
            transition: all 0.2s;
        }

        .thumb.active, .thumb:hover {
            border-color: var(--primary-teal);
        }

        .thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Right Column: Configuration & Purchase Actions */
        .product-config-panel {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .selectors-row {
            display: flex;
            gap: 2rem;
        }

        .selector-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .selector-group label {
            font-weight: 700;
            font-size: 0.9rem;
        }

        .custom-select {
            padding: 0.6rem 2rem 0.6rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            background: #fff;
            font-size: 0.95rem;
            outline: none;
            cursor: pointer;
        }

        .capacity-options {
            display: flex;
            gap: 0.5rem;
        }

        .capacity-btn {
            padding: 0.6rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            background: white;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s;
        }

        .capacity-btn.active {
            background: var(--primary-teal);
            color: white;
            border-color: var(--primary-teal);
        }

        /* Quantity Incrementor */
        .quantity-control {
            display: flex;
            align-items: center;
            border: 1px solid var(--border-color);
            width: max-content;
            border-radius: 6px;
            background: #fff;
        }

        .qty-btn {
            background: none;
            border: none;
            width: 36px;
            height: 36px;
            cursor: pointer;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .qty-input {
            width: 45px;
            text-align: center;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            outline: none;
        }

        /* Call To Actions */
        .purchase-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .btn-action {
            flex: 1;
            padding: 0.85rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background 0.2s;
        }

        .btn-add-cart {
            background: var(--accent-orange);
            color: white;
        }

        .btn-add-cart:hover {
            background: #e06b00;
        }

        .btn-buy-now {
            background: var(--primary-teal);
            color: white;
        }

        .btn-buy-now:hover {
            background: #084c5a;
        }

        .btn-icon-only {
            background: #fff;
            border: 1px solid var(--border-color);
            width: 42px;
            height: 42px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-icon-only:hover {
            background: #f0f0f0;
        }

        .action-sub-links {
            display: flex;
            gap: 1.5rem;
            font-size: 0.9rem;
        }

        .action-sub-links a {
            color: var(--text-dark);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Description & Vendor Box Area */
        .info-section-divider {
            border-top: 1px solid var(--border-color);
            margin: 1.5rem 0;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .description-text {
            font-size: 0.95rem;
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* Vendor Details Card */
        .vendor-mini-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            border: 1px solid var(--border-color);
            padding: 1rem;
            border-radius: 12px;
        }

        .vendor-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .vendor-avatar {
            width: 48px;
            height: 48px;
            background: #fdf0e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .vendor-details h4 {
            font-size: 1rem;
            font-weight: 700;
        }

        .vendor-details p {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .btn-chat {
            background: var(--primary-teal);
            color: white;
            border: none;
            padding: 0.5rem 1.25rem;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
        }

        /* Tech Specs Grid Table */
        .specs-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        .specs-table tr {
            border-bottom: 1px solid var(--border-color);
        }

        .specs-table td {
            padding: 0.6rem 0;
        }

        .specs-table td:first-child {
            font-weight: 600;
            color: var(--text-muted);
            width: 40%;
        }

        /* Related Products Section */
        .related-section {
            margin-top: 4rem;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .related-card {
            background: #fff;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
            padding: 1rem;
            text-align: center;
        }

        .related-img-box {
            height: 140px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            margin-bottom: 0.75rem;
            font-size: 2rem;
        }

        .related-name {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .related-price {
            color: var(--accent-orange);
            font-weight: 700;
            font-size: 0.95rem;
        }

        /* Responsive Breakpoint */
        @media (max-width: 992px) {
            .product-grid {
                grid-template-columns: 1fr;
            }
            .main-image-box {
                height: 350px;
            }
        }
    </style>

@endsection
@section('content')

<div class="container">
    <div class="product-grid">

        <!-- LEFT BRANDING & MAIN DISPLAY -->
        <div class="image-gallery-container">
            <div class="product-title-section">
                <h1>{{ $product->description }}</h1>
                <div class="product-meta-top">
                    <span class="product-price">${{ $product->price }}</span>
                    <span class="vendor-link">Sold by: <a href="#">{{ $product->shop->name }}.</a></span>
                    <span class="rating-stars">★★★★★ <span style="color: var(--text-muted); font-size: 0.85rem;">(731 ratings)</span></span>
                </div>
            </div>

            <div class="main-image-box">
                <!-- Fallback to placeholder view if asset image path omitted -->
                <img src="watermarked_img_18220048871460439031.png" alt="Aura Smart Mug Main View">
            </div>

            <div class="thumbnail-row">
                <div class="thumb active"><img src="watermarked_img_18220048871460439031.png" alt="Thumb 1"></div>
                <div class="thumb"><div style="display:flex; justify-content:center; align-items:center; height:100%; font-size:1.5rem;">☕</div></div>
                <div class="thumb"><div style="display:flex; justify-content:center; align-items:center; height:100%; font-size:1.5rem;">📱</div></div>
                <div class="thumb"><div style="display:flex; justify-content:center; align-items:center; height:100%; font-size:1.5rem;">🔋</div></div>
            </div>

            <div class="info-section-divider"></div>

            <div class="section-title">Product Description</div>
            <p class="description-text">
                Experience precision temperature control with the Aura Smart Mug. Designed to keep your morning coffee or tea at your ideal drinking temperature from the first sip to the last drop. Integrated with a dynamic app ecosystem for remote heating settings and notifications.
            </p>
        </div>

        <!-- RIGHT OPTIONS & CART UTILITIES -->
        <div class="product-config-panel">
            <div class="selectors-row">
                <div class="selector-group">
                    <label for="colorSelect">Color</label>
                    <select id="colorSelect" class="custom-select">
                        <option>Matte Black</option>
                        <option>White</option>
                        <option>Teal</option>
                    </select>
                </div>

                <div class="selector-group">
                    <label>Capacity</label>
                    <div class="capacity-options">
                        <button class="capacity-btn active">12oz</button>
                        <button class="capacity-btn">16oz</button>
                    </div>
                </div>
            </div>

            <div class="selector-group">
                <label>Quantity</label>
                <div class="quantity-control">
                    <button class="qty-btn" onclick="decrementQty()">−</button>
                    <input type="text" id="qtyInput" class="qty-input" value="1" readonly>
                    <button class="qty-btn" onclick="incrementQty()">+</button>
                </div>
            </div>

            <div class="purchase-actions">
                <button class="btn-action btn-add-cart">
                    🛒 Add to Cart
                </button>
                <button class="btn-action btn-buy-now">
                    Buy Now
                </button>
                <button class="btn-icon-only" title="Share Page">
                    🔗
                </button>
            </div>

            <div class="action-sub-links">
                <a href="#" onclick="alert('Added to wishlist!')">🤍 Add to Wishlist</a>
            </div>

            <div class="info-section-divider"></div>

            <!-- Technical Attributes Section -->
            <div class="section-title">Technical Specifications</div>
            <table class="specs-table">
                <tr>
                    <td>Capacity</td>
                    <td>12oz / 16oz options</td>
                </tr>
                <tr>
                    <td>Battery Life</td>
                    <td>Up to 3 hours off-coaster</td>
                </tr>
                <tr>
                    <td>Voltage</td>
                    <td>30 W Charging Base</td>
                </tr>
                <tr>
                    <td>Connectivity</td>
                    <td>Bluetooth App Control</td>
                </tr>
            </table>

            <div class="info-section-divider"></div>

            <!-- Multi-Vendor Store Metadata Card -->
            <div class="section-title">Vendor Info</div>
            <div class="vendor-mini-card">
                <div class="vendor-info">
                    <div class="vendor-avatar">☕</div>
                    <div class="vendor-details">
                        <h4>BrewMaster Co.</h4>
                        <p>Top Verified Marketplace Seller</p>
                    </div>
                </div>
                <button class="btn-chat">Chat Now</button>
            </div>

        </div>
    </div>

    <!-- RELATED ITEMS CROSS-SELL -->
    <div class="related-section">
        <h2 class="h3 fw-bold">Related Products</h2>
        <div class="related-grid">
            <div class="related-card">
                <div class="related-img-box">☕</div>
                <div class="related-name">Bazario Brew Station</div>
                <div class="related-price">$49.99</div>
            </div>
            <div class="related-card">
                <div class="related-img-box">🫘</div>
                <div class="related-name">Coffee Bean Trio Pack</div>
                <div class="related-price">$49.99</div>
            </div>
            <div class="related-card">
                <div class="related-img-box">🥛</div>
                <div class="related-name">Bazario Brew Trio Mug</div>
                <div class="related-price">$49.99</div>
            </div>
            <div class="related-card">
                <div class="related-img-box">🍵</div>
                <div class="related-name">Bazario Matt Smart Mug</div>
                <div class="related-price">$49.99</div>
            </div>
        </div>
    </div>
</div>



@endsection
@section('script')
<script>
    function incrementQty() {
        const input = document.getElementById('qtyInput');
        input.value = parseInt(input.value) + 1;
    }

    function decrementQty() {
        const input = document.getElementById('qtyInput');
        if(parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>
@endsection

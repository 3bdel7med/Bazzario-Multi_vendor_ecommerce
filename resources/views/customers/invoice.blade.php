<!DOCTYPE html>
<html lang="en">
<head>
    <style>
  /* Base Container & Typography Layout */
  .purchase-history-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 3rem 1rem;
    font-family: system-ui, -apple-system, sans-serif;
  }
  .page-title-area {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
  }
  .page-title {
    font-size: 1.75rem;
    font-weight: 800;
    color: #212529;
    margin: 0;
  }
  .btn-print {
    padding: 0.5rem 1rem;
    border: 1px solid #ccc;
    background: transparent;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    color: #333;
    font-size: 0.875rem;
  }

  /* Order Card Main Structure */
  .order-card {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    margin-bottom: 3rem;
    overflow: hidden;
    background: #fff;
  }

  /* Order Header Grid (Replaces BS Row/Col Layout) */
  .order-header {
    background-color: #212529;
    color: #fff;
    padding: 1rem 1.5rem;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    align-items: center;
  }
  .header-meta-label {
    color: #adb5bd;
    font-size: 0.75rem;
    text-transform: uppercase;
    display: block;
    margin-bottom: 0.25rem;
  }
  .header-meta-value {
    font-size: 0.875rem;
  }
  .text-success-custom { color: #2ec4b6; font-weight: bold; }
  .text-warning-custom { color: #ff9f1c; font-weight: bold; font-family: monospace; }

  /* Badges & Statuses */
  .status-badge {
    display: inline-block;
    padding: 0.25rem 0.5rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 600;
  }
  .badge-success { background-color: #198754; color: #fff; }
  .badge-secondary { background-color: #6c757d; color: #fff; }
  .badge-info { background-color: #0dcaf0; color: #000; }
  .badge-warning { background-color: #ffc107; color: #000; }
  .badge-danger { background-color: #dc3545; color: #fff; }

  .shipment-badge {
    padding: 0.35rem 0.75rem;
    border-radius: 4px;
    font-size: 0.75rem;
    text-transform: uppercase;
    font-weight: bold;
  }

  /* Vendor Shipment Section */
  .shipment-block {
    border-bottom: 1px solid #e9ecef;
    padding: 1.5rem;
    background: linear-gradient(to bottom, #f8f9fa, #ffffff);
  }
  .shipment-meta-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 1rem;
  }
  .shipment-title {
    font-size: 1rem;
    font-weight: bold;
    color: #0d6efd;
    margin: 0;
  }
  .shipment-title span { color: #212529; }

  /* Item List Structures */
  .item-list-container {
    border: 1px solid #e9ecef;
    border-radius: 6px;
    overflow: hidden;
  }
  .item-row {
    background-color: #fff;
    padding: 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 0.5rem;
    border-bottom: 1px solid #e9ecef;
  }
  .item-row:last-child { border-bottom: none; }
  .item-title { font-size: 0.95rem; font-weight: bold; color: #212529; margin: 0 0 0.25rem 0; }
  .item-qty { font-size: 0.825rem; color: #6c757d; margin: 0; }
  .item-qty span { font-weight: bold; color: #212529; }
  .item-price { font-weight: bold; color: #212529; }

  /* Card Footer */
  .order-footer {
    background-color: #fff;
    padding: 1rem 1.5rem;
    font-size: 0.825rem;
    color: #6c757d;
  }
  .footer-label { font-weight: 600; color: #212529; display: block; margin-bottom: 0.25rem; }
  .footer-text { margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

  /* Empty States & Utility Flex */
  .empty-state { text-align: center; padding: 3rem 0; color: #6c757d; }
  .pagination-row { display: flex; justify-content: center; margin-top: 1.5rem; }
</style>
</head>
<body>
    <div class="toast-container" id="toastContainer"></div>

<nav>
  <div class="nav-inner">
    <a class="logo" style="cursor:pointer">Bazar<span>io</span></a>
    <ul class="nav-links">
      <li><a href="{{ route('home') }}" id="nav-home" class="active">Home</a></li>
      <li><a href="{{ route('new-arrivals') }}" id="nav-arrivals">New Arrivals</a></li>
      <li><a href="{{ route('categories') }}" id="nav-categories">Categories</a></li>
      <li><a href="{{ route('vendors') }}" id="nav-vendors">Vendors</a></li>
      <li><a href="{{ route('blog') }}" id="nav-blog">Blog</a></li>
      <li><a href="{{ route('customer.orders') }}" id="nav-orders">My Orders</a></li>
    </ul>
    <div class="nav-right">
      <div class="nav-search">
        <span style="color:var(--muted);font-size:14px">🔍</span>
        <input type="text" placeholder="Search products…"/>
      </div>
    @auth
      <div class="icon-btn" onclick="showToastCustom('🤍 Wishlist updated')">🤍</div>
      <div class="icon-btn" onclick="showModularPage('cart')"><a href="{{ route('customer.cart') }}"> 🛒</a><span class="cart-badge" id="globalCartBadge">{{ auth()->user()->cartItems()->count() }}</span></div>

      <div class="icon-btn" onclick="showModularPage('messages')" title="Messages">
          💬<span class="cart-badge badge-msg" id="globalMsgBadge">2</span>
      </div>
      <div class="icon-btn" onclick="showModularPage('notifications')" title="Notifications">
          🔔<span class="cart-badge badge-notif" id="globalNotifBadge">5</span>
      </div>

      <div class="dropdown">
        <button class="btn-primary signin-btn dropdown-toggle" type="button" id="userMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenuButton">
          <li><a class="dropdown-item" href="/profile">Profile</a></li>
          <li><a class="dropdown-item" href="/orders">My Orders</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
              <form method="post" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item">logout</button>
              </form>
          </li>
        </ul>
      </div>
      @else
      <a href="{{ route('login') }}" class="btn-primary signin-btn">Sign In</a>
      <button class="hamburger" id="ham" aria-label="Menu" onclick="toggleMenu()">
        <span></span><span></span><span></span>
      </button>
      @endauth
    </div>
  </div>
</nav>

<div class="mobile-menu" id="mobileMenu">
  <div class="mobile-search">
    <span style="color:var(--muted)">🔍</span>
    <input type="text" placeholder="Search products…"/>
  </div>
  <a href="{{ route('home') }}" class="mobile-nav-link">Home</a>
  <a href="{{ route('new-arrivals') }}" class="mobile-nav-link">New Arrivals</a>
  <a href="{{ route('categories') }}" class="mobile-nav-link">Categories</a>
  <a href="{{ route('vendors') }}" class="mobile-nav-link">Vendors</a>
  <a href="{{ route('blog') }}" class="mobile-nav-link">Blog</a>
  <a href="{{ route('customer.orders') }}" class="mobile-nav-link">My Orders</a>
  <a href="{{ route('customer.cart') }}" class="mobile-nav-link">My Cart (🗑️)</a>

  @auth
  <a href="#" onclick="toggleMenu(); showModularPage('messages')" class="mobile-nav-link">Messages (💬)</a>
  <a href="#" onclick="toggleMenu(); showModularPage('notifications')" class="mobile-nav-link">Notifications (🔔)</a>
  @endauth

  <div class="mobile-cta">
    <a href="{{ route('login') }}" class="btn-primary" style="justify-content:center;width:100%">Sign In</a>
  </div>
</div>

<div class="page active" id="page-home">
  <div class="trust-bar">
    <div class="trust-inner">
      <div class="trust-item"><div class="trust-icon">🚚</div><div class="trust-text"><strong>Free Shipping</strong><span>Orders above $49</span></div></div>
      <div class="trust-item"><div class="trust-icon">🔄</div><div class="trust-text"><strong>Easy Returns</strong><span>30-day hassle free</span></div></div>
      <div class="trust-item"><div class="trust-icon">🔒</div><div class="trust-text"><strong>Secure Payment</strong><span>256-bit SSL encrypted</span></div></div>
      <div class="trust-item"><div class="trust-icon">💬</div><div class="trust-text"><strong>24/7 Support</strong><span>Chat with our team</span></div></div>
    </div>
  </div>

  <div class="purchase-history-container" dir="ltr">
    <div class="page-title-area">
        <h1 class="page-title">My Purchase History</h1>
    </div>

    @forelse($orders as $order)
        <div class="order-card">
            <div class="order-header">
                <div>
                    <span class="header-meta-label">Order Placed</span>
                    <span class="header-meta-value">{{ $order->created_at->format('M d, Y H:i') }}</span>
                </div>
                <div>
                    <span class="header-meta-label">Total Amount</span>
                    <span class="header-meta-value text-success-custom">${{ number_format($order->total_price, 2) }}</span>
                </div>
                <div>
                    <span class="header-meta-label">Payment Status</span>
                    <span class="status-badge badge-success">
                        {{ $order->payment_status }} ({{ $order->payment_method ?? 'Card' }})
                    </span>
                </div>
                <div>
                    <span class="header-meta-label">Order ID</span>
                    <span class="text-warning-custom">{{ $order->order_number }}</span>
                </div>
                <div style="text-align: right;">
                    <a href="{{ route('invoice', $order->id) }}" class="btn-print">🖨️ Invoice</a>
                </div>
            </div>

            <div>
                @foreach($order->vendorOrders as $subOrder)
                    <div class="shipment-block">
                        <div class="shipment-meta-row">
                            <h3 class="shipment-title">
                                🏪 Shipment from: <span>{{ $subOrder->shop->name ?? 'Unknown Shop' }}</span>
                            </h3>

                            @if($subOrder->status === 'pending')
                                <span class="shipment-badge badge-secondary">Awaiting Processing</span>
                            @elseif($subOrder->status === 'processing')
                                <span class="shipment-badge badge-info">Packing Item</span>
                            @elseif($subOrder->status === 'shipped')
                                <span class="shipment-badge badge-warning">Out For Delivery</span>
                            @elseif($subOrder->status === 'delivered')
                                <span class="shipment-badge badge-success">Delivered</span>
                            @else
                                <span class="shipment-badge badge-danger">Cancelled</span>
                            @endif
                        </div>

                        <div class="item-list-container">
                            @foreach($subOrder->items as $item)
                                <div class="item-row">
                                    <div>
                                        <h4 class="item-title">{{ $item->product->name ?? 'Unknown Product' }}</h4>
                                        <p class="item-qty">Qty Purchased: <span>x{{ $item->quantity ?? 0 }}</span></p>
                                    </div>
                                    <span class="item-price">${{ number_format($item->price * ($item->quantity ?? 0), 2) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="order-footer">
                <span class="footer-label">Shipping Destination:</span>
                <p class="footer-text" title="{{ $order->shipping_address }}">{{ $order->shipping_address }}</p>
            </div>
        </div>
    @empty
        <div class="empty-state">
            <p>You haven't placed any orders yet.</p>
        </div>
    @endforelse

    <div class="pagination-row">
        </div>
  </div>
</div>
</body>
</html>


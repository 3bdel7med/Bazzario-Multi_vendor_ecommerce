<div class="toast-container" id="toastContainer"></div>

<!-- ── STICKY NAVBAR ── -->
<nav>
  <div class="nav-inner">
    <a href="{{ route('home') }}"  class="logo" style="cursor:pointer">Baz<span>ar</span>io</a>
    <ul class="nav-links">
      <li><a href="{{ route('home') }}" id="nav-home" class="active" >Home</a></li>
      <li><a href="{{ route('new-arrivals') }}" id="nav-arrivals" >New Arrivals</a></li>
      <li><a href="{{ route('categories') }}" id="nav-categories">Categories</a></li>
      <li><a href="{{ route('vendors') }}" id="nav-vendors">Vendors</a></li>
      <li><a href="{{ route('blog') }}" id="nav-blog" >Blog</a></li>
      <li><a href="{{ route('customer.orders') }}" id="nav-orders" >My Orders</a></li>
    </ul>
    <div class="nav-right">
      <div class="nav-search">
        <span style="color:var(--muted);font-size:14px">🔍</span>
        <input type="text" placeholder="Search products…"/>
      </div>
    @auth
      <div class="icon-btn" onclick="showToastCustom('🤍 Wishlist updated')"> ❤️ <span class="cart-badge" >{{ auth()->user()->wishlists()->count() }}</span></div>
      <div class="icon-btn" onclick="showModularPage('cart')"><a href="{{ route('customer.cart') }}"> 🛒</a><span class="cart-badge" >{{ auth()->user()->cartItems()->count() }}</span></div>

   

      <!-- ── Messages and Notifications ── -->
      <div class="icon-btn" onclick="showModularPage('messages')" title="Messages">
          💬<span class="cart-badge badge-msg" id="globalMsgBadge">2</span>
      </div>
      <div class="icon-btn" onclick="showModularPage('notifications')" title="Notifications">
          🔔<span class="cart-badge badge-notif" id="globalNotifBadge">5</span>
      </div>

      <!-- Authenticated User Dropdown -->
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
                  <button type="submit" class="dropdown-item">
                      logout
                  </button>
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

<!-- ── MOBILE MENU ── -->
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
  <a href="{{ route('cart') }}" class="mobile-nav-link">My Cart (🗑️)</a>

  @auth
  <!-- Added Mobile links for authenticated state features -->
  <a href="#" onclick="toggleMenu(); showModularPage('messages')" class="mobile-nav-link">Messages (💬)</a>
  <a href="#" onclick="toggleMenu(); showModularPage('notifications')" class="mobile-nav-link">Notifications (🔔)</a>
  @endauth

  <div class="mobile-cta">
    <a href="{{ route('login') }}" class="btn-primary" style="justify-content:center;width:100%">Sign In</a>
  </div>
</div>

<!-- ===================== PAGE: CLASSIC HOME ===================== -->
<div class="page active" id="page-home">
  <div class="trust-bar">
    <div class="trust-inner">
      <div class="trust-item"><div class="trust-icon">🚚</div><div class="trust-text"><strong>Free Shipping</strong><span>Orders above $49</span></div></div>
      <div class="trust-item"><div class="trust-icon">🔄</div><div class="trust-text"><strong>Easy Returns</strong><span>30-day hassle free</span></div></div>
      <div class="trust-item"><div class="trust-icon">🔒</div><div class="trust-text"><strong>Secure Payment</strong><span>256-bit SSL encrypted</span></div></div>
      <div class="trust-item"><div class="trust-icon">💬</div><div class="trust-text"><strong>24/7 Support</strong><span>Chat with our team</span></div></div>
    </div>
  </div>

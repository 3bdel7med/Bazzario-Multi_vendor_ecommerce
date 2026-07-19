<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,300;0,600;0,900;1,300;1,600&family=Instrument+Sans:wght@400;500;600&family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    @yield('style')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('bootstrap/app.css') }}"/>

</head>
<body>
    @include('sections.header')
    <div class="container-fluid py-4 bg-light min-vh-100">

  <div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body d-flex align-items-center">
          <div class="flex-shrink-0 bg-primary-subtle text-primary p-3 rounded-3 me-3">
            <i class="bi bi-currency-dollar fs-4"></i>
          </div>
          <div>
            <h6 class="text-muted mb-1 text-uppercase fs-7 fw-semibold">Total GMV</h6>
            <h4 class="mb-0 fw-bold">$128,450</h4>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body d-flex align-items-center">
          <div class="flex-shrink-0 bg-success-subtle text-success p-3 rounded-3 me-3">
            <i class="bi bi-shop fs-4"></i>
          </div>
          <div>
            <h6 class="text-muted mb-1 text-uppercase fs-7 fw-semibold">Active Vendors</h6>
            <h4 class="mb-0 fw-bold">{{ $adminStats['vendors_count'] }}</h4>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body d-flex align-items-center">
          <div class="flex-shrink-0 bg-warning-subtle text-warning p-3 rounded-3 me-3">
            <i class="bi bi-cart-check fs-4"></i>
          </div>
          <div>
            <h6 class="text-muted mb-1 text-uppercase fs-7 fw-semibold">Total Orders</h6>
            <h4 class="mb-0 fw-bold">{{ $adminStats['orders_count'] }}</h4>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body d-flex align-items-center">
          <div class="flex-shrink-0 bg-info-subtle text-info p-3 rounded-3 me-3">
            <i class="bi bi-people fs-4"></i>
          </div>
          <div>
            <h6 class="text-muted mb-1 text-uppercase fs-7 fw-semibold">Total Users</h6>
            <h4 class="mb-0 fw-bold">{{ $adminStats['users_count'] }}</h4>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-4">

    <div class="col-12 col-lg-3">
      <div class="card border-0 shadow-sm p-2">
        <div class="card-header bg-transparent border-0 pt-3 pb-2">
          <h6 class="text-muted text-uppercase fs-7 fw-bold mb-0">Management</h6>
        </div>
        <div class="list-group list-group-flush gap-1">
          <a href="#" class="list-group-item list-group-item-action border-0 rounded-2 d-flex align-items-center dynamic-nav">
            <i class="bi bi-grid-1x2 me-3"></i> Overview
          </a>
          <a href="#" class="list-group-item list-group-item-action border-0 rounded-2 d-flex align-items-center dynamic-nav">
            <i class="bi bi-people me-3"></i> Users
          </a>
          <a href="#" class="list-group-item list-group-item-action border-0 rounded-2 d-flex align-items-center dynamic-nav">
            <i class="bi bi-journal-text me-3"></i> Posts
          </a>
          <a href="#" class="list-group-item list-group-item-action border-0 rounded-2 d-flex align-items-center dynamic-nav active">
            <i class="bi bi-shop me-3"></i> Vendors
          </a>
          <a href="#" class="list-group-item list-group-item-action border-0 rounded-2 d-flex align-items-center dynamic-nav">
            <i class="bi bi-tags me-3"></i> Platform Categories
          </a>
          <a href="#" class="list-group-item list-group-item-action border-0 rounded-2 d-flex align-items-center dynamic-nav">
            <i class="bi bi-cart3 me-3"></i> Orders
          </a>
          <a href="#" class="list-group-item list-group-item-action border-0 rounded-2 d-flex align-items-center dynamic-nav">
            <i class="bi bi-hash me-3"></i> Tags
          </a>
                    <a href="#" class="list-group-item list-group-item-action border-0 rounded-2 d-flex align-items-center dynamic-nav">
            <i class="bi bi-hash me-3"></i> Messages
          </a>
                    <a href="#" class="list-group-item list-group-item-action border-0 rounded-2 d-flex align-items-center dynamic-nav">
            <i class="bi bi-hash me-3"></i> Notifcations
          </a>
          <a href="#" class="list-group-item list-group-item-action border-0 rounded-2 d-flex align-items-center dynamic-nav">
            <i class="bi bi-wallet2 me-3"></i> Revenue & Fees
          </a>

        </div>
      </div>
    </div>

    <div class="col-12 col-lg-9">
        @yield('content')

    </div>

  </div>
</div>


    @include('sections.footer')
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @yield('script')
</body>
</html>

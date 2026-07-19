<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!-- favicon -->
<link rel="icon" type="image/png" href="bazario.png">
<title>
@yield('title')
</title>
 @vite('resources/css/app.css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,300;0,600;0,900;1,300;1,600&family=Instrument+Sans:wght@400;500;600&family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>
<link rel="stylesheet" href="{{ asset('bootstrap/app.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/vendor-style.css') }}">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@yield('styles')

</head>
<body >
    @include('sections.header')
    <div class="vendor-wrapper">
    <!-- Sidebar Left Navigation -->
    <aside class="vendor-sidebar">
        <div class="sidebar-brand">
            <h2>Bazario</h2>
            <span class="label label-vendor">Vendor Portal</span>
        </div>
        <ul class="nav nav-stacked sidebar-nav">
            <li class="active"><a href="#"><span class="glyphicon glyphicon-dashboard"></span> Store Overview</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Orders <span class="badge badge-pink pull-right">4</span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-barcode"></span> Products List</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-plus"></span> Add New Product</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-piggy-bank"></span> Payouts & Earnings</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Store Settings</a></li>
        </ul>
    </aside>

    <!-- Main Content Work Area -->
    <main class="vendor-content container-fluid">
        <!-- Top Operational Header Bar -->
        <header class="row content-header">
            <div class="col-md-6 col-xs-12">
                <h1 class="page-title">Welcome back, Store Vendor 👋</h1>
                <p class="text-muted">Here is your store performance status for today.</p>
            </div>
            <div class="col-md-6 col-xs-12 text-right header-actions">
                <button class="btn btn-action-black"><span class="glyphicon glyphicon-plus"></span> Add Product</button>
            </div>
        </header>
            @yield('content')


 </main>
</div>

    @include('sections.footer')
    @include('sections.chat')
    <script src="{{ asset('assets/js/script.js') }}"></script>
     @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/css/app.js') }}"></script>
    @yield('script')
</body>
</html>


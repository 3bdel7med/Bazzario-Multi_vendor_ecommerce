
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{ asset('assets/css/modern-ecommerce.css') }}">
 </head>
 <body>
<div class="container-fluid py-4">

    <header class="mb-4">
        <!--navbar with search bar and user profile dropdown-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded-3 mb-3">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">Seller Panel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <form class="d-flex ms-auto">
                        <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav ms-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userProfileDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle fs-5"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="notification-toast" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>

@auth
    @if(auth()->user()->role === 'admin') {{-- Adjust this to match your multi-vendor admin logic --}}
        <script type="module">
            document.addEventListener('DOMContentLoaded', function () {
                window.Echo.channel('admin-notifications')
                    .listen('.user.registered', (data) => {
                        console.log('New Event Received:', data);

                        // Example: Create a simple alert/toast layout dynamically
                        const toast = document.createElement('div');
                        toast.className = "alert alert-success alert-dismissible fade show";
                        toast.role = "alert";
                        toast.innerHTML = `
                            <strong>${data.message}</strong><br>
                            Name: ${data.name} (${data.role})<br>
                            <small>${data.registered_at}</small>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        `;

                        document.getElementById('notification-toast').appendChild(toast);

                        // Optional: You could also increment an admin notification counter badge here
                    });
            });
        </script>
    @endif
@endauth
        <h1 class="fw-bold">Dashboard</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </header>
    <div class="row">

        <!-- Dashboard Sidebar -->
        <div class="col-lg-3 col-xl-2 mb-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100">
                <div class="d-flex align-items-center mb-4 px-2">
                    <div class="bg-primary rounded-circle p-2 text-white me-2">
                        <i class="bi bi-shop fs-5"></i>
                    </div>
                    <h6 class="fw-bold mb-0">Seller Panel</h6>
                </div>
                <div class="nav flex-column nav-pills custom-dashboard-nav">
                    <!-- pass the active class to the current page link -->

                    <a class="nav-link mb-2" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i> Overview</a>
                    <a class="nav-link mb-2 text-dark" href="{{ route('products.index') }}"><i class="bi bi-box-seam me-2"></i> My Products</a>
                    <a class="nav-link mb-2 text-dark" href="{{ route('categories.index') }}"><i class="bi bi-card-list me-2"></i> Categories</a>
                    <a class="nav-link mb-2 text-dark" href="#"><i class="bi bi-receipt me-2"></i> Orders</a>
                    <a class="nav-link mb-2 text-dark" href="#"><i class="bi bi-graph-up-arrow me-2"></i> Analytics</a>
                    <a class="nav-link mb-2 text-dark" href="#"><i class="bi bi-wallet2 me-2"></i> Payouts</a>
                    <hr>
                    <a class="nav-link text-danger" href="{{ route('logout') }}"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
                </div>
            </div>
        </div>


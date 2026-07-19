@extends('layouts.app')
@section('title')
Login To Bazzario
@endsection
@section('styles')
    <style>
        :root {
            --brand-primary: #0d6efd;
        }
        body, html {
            height: 100%;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
            background-color: #ffffff;
        }
        /* Right Side Branding Graphic Styling */
        .login-bg {
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.85), rgba(102, 16, 242, 0.85)),
                        url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
        }
        /* Glassmorphism panel for branding side */
        .glass-panel {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
        }
        .form-control:focus {
            border-color: var(--brand-primary);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }
        .social-btn {
            border: 1px solid #dee2e6;
            transition: all 0.2s ease;
            background: #fff;
        }
        .social-btn:hover {
            background: #f8f9fa;
            border-color: #ced4da;
        }
    </style>
@endsection
@section('content')


<div class="container-fluid h-100 p-0">
    <div class="row h-100 g-0">

        <!-- Left Column: Focused Login Form -->
        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center py-5">
            <div class="w-100 px-4 px-sm-5" style="max-width: 460px;">

                <!-- Logo / Brand Title -->
                <div class="mb-4">
                    <a href="/" class="text-decoration-none d-flex align-items-center gap-2 mb-2">
                        <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded-3" style="width: 40px; height: 40px;">
                            <i class="bi bi-bag-heart-fill fs-5"></i>
                        </div>
                        <span class="fs-4 fw-bold text-dark">MegaMarket</span>
                    </a>
                    <h2 class="fw-bold tracking-tight text-dark mb-1">Welcome back</h2>
                    <p class="text-muted">Welcome back! Please enter your details.</p>
                </div>

                <!-- Social Login Buttons (Optional Multi-vendor standard) -->
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <button class="btn social-btn w-100 py-2 d-flex align-items-center justify-content-center gap-2 small fw-medium">
                            <i class="bi bi-google text-danger"></i> Google
                        </button>
                    </div>
                    <div class="col-6">
                        <button class="btn social-btn w-100 py-2 d-flex align-items-center justify-content-center gap-2 small fw-medium">
                            <i class="bi bi-apple text-dark"></i> Apple
                        </button>
                    </div>
                </div>

                <div class="position-relative d-flex align-items-center justify-content-center my-4">
                    <hr class="w-100 text-muted m-0">
                    <span class="position-absolute bg-white px-3 small text-muted text-uppercase">or use email</span>
                </div>

                <!-- Actual register Form -->
                <form method="POST" action="/register">
                     @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label small fw-semibold text-secondary">Full Name</label>
                        <input type="text" id="name" name="name" class="form-select-lg form-control rounded-3 fs-6" placeholder="John Doe" required autofocus>
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label small fw-semibold text-secondary">Email address</label>
                        <input type="email" id="email" name="email" class="form-select-lg form-control rounded-3 fs-6" placeholder="name@example.com" required autofocus>
                        <!-- Breeze error block alternative: <div class="text-danger small mt-1">$errors->get('email')</div> -->
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label for="password" class="form-label small fw-semibold text-secondary mb-0">Password</label>
                            <a href="/forgot-password" class="text-decoration-none small fw-medium">Forgot password?</a>
                        </div>
                        <input type="password" id="password" name="password" class="form-select-lg form-control rounded-3 fs-6" placeholder="••••••••" required>
                    </div>
                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label small fw-semibold text-secondary">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-select-lg form-control rounded-3 fs-6" placeholder="••••••••" required>
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="mb-4 form-check d-flex align-items-center gap-1">
                        <input type="checkbox" class="form-check-input mt-0" id="remember_me" name="remember">
                        <label class="form-check-label small text-muted" for="remember_me">Remember me for 30 days</label>
                    </div>
                    <!-- error messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-3 fs-6 fw-medium shadow-sm py-2">
                        Sign up
                    </button>
                </form>

                <!-- Footer Sign up prompt -->
                <p class="text-center text-muted small mt-4 mb-0">
                    Already have an account? <a href="/login" class="text-decoration-none fw-semibold">Sign in </a>
                </p>

            </div>
        </div>

        <!-- Right Column: Visual Brand Banner (Hidden on Small Screens) -->
        <div class="col-12 col-md-6 d-none d-md-flex align-items-center justify-content-center login-bg p-5 position-relative">
            <div class="glass-panel p-5 text-white max-w-md w-100" style="max-width: 500px;">
                <span class="badge bg-white bg-opacity-20 text-white px-3 py-2 rounded-pill uppercase mb-3 small tracking-wider">New Features live</span>
                <h1 class="display-6 fw-bold mb-3">The easiest way to manage your multi-vendor orders.</h1>
                <p class="text-white-50 leading-relaxed mb-0">Join thousands of global vendors and customers interacting seamlessly within a highly reliable ecosystem.</p>

                <div class="mt-4 pt-4 border-top border-white border-opacity-10 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <div class="avatar-group d-flex">
                            <span class="small text-white-50">Trusted by over 40k+ users</span>
                        </div>
                    </div>
                    <div class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

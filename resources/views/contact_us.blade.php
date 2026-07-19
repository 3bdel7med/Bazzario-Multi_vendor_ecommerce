
@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-6">
            <h2 class="fw-bold mb-4">Get in Touch</h2>
            <p class="text-muted mb-5">Have questions about a vendor or an order? We're here to help.</p>
            <div class="row g-4">
                <div class="col-sm-6">
                    <div class="p-3 border rounded-4 shadow-sm text-center">
                        <i class="bi bi-envelope text-primary fs-2"></i>
                        <h6 class="mt-2">Email Support</h6>
                        <p class="small mb-0">support@nexmart.com</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="p-3 border rounded-4 shadow-sm text-center">
                        <i class="bi bi-telephone text-primary fs-2"></i>
                        <h6 class="mt-2">Phone</h6>
                        <p class="small mb-0">+20 123 456 7890</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg p-4 rounded-4">
                <form>
                    <div class="mb-3"><input type="text" class="form-control form-control-lg" placeholder="Full Name"></div>
                    <div class="mb-3"><input type="email" class="form-control form-control-lg" placeholder="Email Address"></div>
                    <div class="mb-3"><textarea class="form-control form-control-lg" rows="4" placeholder="Your Message"></textarea></div>
                    <button class="btn btn-primary w-100 py-3 rounded-pill">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

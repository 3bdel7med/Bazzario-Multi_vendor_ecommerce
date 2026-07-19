@extends('layouts.admin')
@section('title')
messages
@endsection
@section('content')
<!-- Main Messages Management Panel (Exclude Header and Sidebar) -->
<div class="p-4" style="background-color: #fcfbfa; min-height: 100vh; font-family: 'Inter', sans-serif;">

    <!-- Page Header Segment -->
    <div class="mb-4">
        <h1 class="h3 fw-bold text-dark mb-1">Messages & Support</h1>
        <p class="text-muted small mb-0">Direct communication center between Bazario admin, vendors, and customers.</p>
    </div>

    <!-- Main Workspace Card -->
    <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
        <div class="row g-0" style="min-height: 70vh;">

            <!-- Left Panel: Chat List (Width: 4/12) -->
            <div class="col-12 col-md-5 col-lg-4 border-end">

                <!-- Chat Search Utility -->
                <div class="p-3 border-bottom">
                    <div class="input-group input-group-sm border rounded-pill px-3 py-1 bg-light bg-opacity-50">
                        <span class="input-group-text bg-transparent border-0 text-muted p-0 me-2">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control bg-transparent border-0 p-0 small shadow-none" placeholder="Search conversations...">
                    </div>
                </div>

                <!-- Conversations List -->
                <div class="overflow-y-auto" style="max-height: 60vh;">

                    <!-- Chat Item 1 (Active / Selected) -->
                    <a href="#" class="d-flex align-items-center p-3 text-decoration-none border-bottom bg-light bg-opacity-50">
                        <div class="position-relative me-3">
                            <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=100&q=80" alt="Vendor" class="rounded-circle object-fit-cover" style="width: 42px; height: 42px;">
                            <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle"></span>
                        </div>
                        <div class="flex-grow-1 text-truncate">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <h6 class="text-dark fw-bold small mb-0 text-truncate" style="max-width: 120px;">TechZone Store</h6>
                                <span class="text-muted" style="font-size: 0.7rem;">12:40 PM</span>
                            </div>
                            <p class="text-secondary small mb-0 text-truncate" style="font-size: 0.8rem;">Regarding the payout request for this week...</p>
                        </div>
                        <span class="badge rounded-pill bg-dark text-white ms-2" style="font-size: 0.65rem;">Vendor</span>
                    </a>

                    <!-- Chat Item 2 (Unread) -->
                    <a href="#" class="d-flex align-items-center p-3 text-decoration-none border-bottom">
                        <div class="position-relative me-3">
                            <div class="rounded-circle bg-secondary-subtle text-dark d-flex align-items-center justify-content-center fw-bold" style="width: 42px; height: 42px; font-size: 0.8rem;">
                                SJ
                            </div>
                            <span class="position-absolute bottom-0 end-0 p-1 bg-secondary border border-white rounded-circle"></span>
                        </div>
                        <div class="flex-grow-1 text-truncate">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <h6 class="text-dark fw-bold small mb-0 text-truncate">Sarah Jenkins</h6>
                                <span class="text-dark fw-bold" style="font-size: 0.7rem;">Yesterday</span>
                            </div>
                            <p class="text-dark fw-semibold small mb-0 text-truncate" style="font-size: 0.8rem;">I didn't receive my package order #BZ-8932 yet.</p>
                        </div>
                        <span class="badge rounded-pill bg-light text-dark border ms-2" style="font-size: 0.65rem;">Buyer</span>
                    </a>

                </div>
            </div>

            <!-- Right Panel: Active Chat Box (Width: 8/12) -->
            <div class="col-12 col-md-7 col-lg-8 d-flex flex-column bg-light bg-opacity-25">

                <!-- Chat Window Header -->
                <div class="p-3 bg-white border-bottom d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=100&q=80" alt="Vendor" class="rounded-circle object-fit-cover me-3" style="width: 40px; height: 40px;">
                        <div>
                            <h5 class="h6 mb-0 fw-bold text-dark">TechZone Store</h5>
                            <span class="text-success" style="font-size: 0.75rem;"><i class="bi bi-circle-fill me-1" style="font-size: 0.4rem;"></i> Online</span>
                        </div>
                    </div>
                    <button class="btn btn-light btn-sm rounded-circle border"><i class="bi bi-telephone"></i></button>
                </div>

                <!-- Chat Messages Stream Area -->
                <div class="flex-grow-1 p-4 overflow-y-auto d-flex flex-column gap-3" style="max-height: 50vh; min-height: 45vh;">

                    <!-- Message 1: Incoming from Vendor -->
                    <div class="d-flex align-items-start max-w-75">
                        <div class="bg-white p-3 rounded-4 shadow-sm border small text-dark" style="border-top-left-radius: 0 !important; max-width: 80%;">
                            Hello Admin, I have uploaded 5 new smartwatches to my store but they are still pending moderation text verification. Could you please check?
                            <span class="d-block text-muted mt-2 text-end" style="font-size: 0.65rem;">11:32 AM</span>
                        </div>
                    </div>

                    <!-- Message 2: Outgoing from Admin -->
                    <div class="d-flex align-items-end justify-content-end max-w-75">
                        <div class="text-white p-3 rounded-4 small" style="background-color: #111; border-top-right-radius: 0 !important; max-width: 80%;">
                            Welcome Ahmed! Yes, our AI Moderation agent is currently processing them. I will review and publish them immediately for you.
                            <span class="d-block opacity-75 mt-2 text-end" style="font-size: 0.65rem;">12:40 PM</span>
                        </div>
                    </div>

                </div>

                <!-- Chat Input Action Bar (Pill-shaped design) -->
                <div class="p-3 bg-white border-top mt-auto">
                    <form action="" method="POST" class="d-flex align-items-center gap-2">
                        <!-- @csrf -->
                        <button type="button" class="btn btn-light btn-sm rounded-circle border p-0 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                            <i class="bi bi-paperclip fs-5 text-secondary"></i>
                        </button>

                        <!-- Main Chat Input Capsule -->
                        <div class="input-group border rounded-pill px-3 py-1 bg-light bg-opacity-50 flex-grow-1">
                            <input type="text" class="form-control bg-transparent border-0 p-0 small shadow-none" placeholder="Type your message here...">
                            <button type="button" class="btn bg-transparent border-0 p-0 text-secondary ms-2">
                                <i class="bi bi-emoji-smile fs-5"></i>
                            </button>
                        </div>

                        <button type="submit" class="btn btn-dark btn-sm rounded-circle p-0 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                            <i class="bi bi-send-fill text-white small"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

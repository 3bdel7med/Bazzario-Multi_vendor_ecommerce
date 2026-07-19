@extends('layouts.vendor')
@section('content')
<div class="container">
    <h1 class="mb-4">Settings</h1>
    <p class="text-muted mb-4">Manage your shop settings.</p>
    <div class="row">
        <div class="col-md-6 mb-4">
            <h3 class="mb-3">Shop Settings</h3>
            <form>
                <div class="mb-3">
                    <label for="shopName" class="form-label">Shop Name</label>
                    <input type="text" class="form-control" id="shopName" placeholder="My Awesome Shop">
                </div>
                <div class="mb-3">
                    <label for="shopDescription" class="form-label">Shop Description</label>
                    <textarea class="form-control" id="shopDescription" rows="3" placeholder="Describe your shop..."></textarea>
                </div>
                <div class="mb-3">
                    <label for="contactEmail" class="form-label">Contact Email</label>
                    <input type="email" class="form-control" id="contactEmail" placeholder="contact@myawesomeshop.com">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

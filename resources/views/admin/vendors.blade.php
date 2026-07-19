@extends('layouts.admin')
@section('content')
<div class="container">
    <h1 class="mb-4">Vendors</h1>
    <p class="text-muted mb-4">Manage your vendors.</p>

    <div class="row">
        <div class="col-md-6 mb-4">
            <h3 class="mb-3">Add Vendor</h3>
            <form>
                <div class="mb-3">
                    <label for="vendorName" class="form-label">Vendor Name</label>
                    <input type="text" class="form-control" id="vendorName" placeholder="John Doe">
                </div>
                <div class="mb-3">
                    <label for="vendorEmail" class="form-label">Vendor Email</label>
                    <input type="email" class="form-control" id="vendorEmail" placeholder="john@doe.com">
                </div>
                <div class="mb-3">
                    <label for="vendorPhone" class="form-label">Vendor Phone</label>
                    <input type="tel" class="form-control" id="vendorPhone" placeholder="(123) 456-7890">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

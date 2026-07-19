@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="avatar-upload-section" style="text-align: center; margin-bottom: 20px;">
        <!-- Avatar Preview (Loads current database avatar or a default image) -->
        <img id="avatar-preview"
             src="{{ auth()->user()->profile && auth()->user()->profile->profile_picture ? asset('storage/avatars/' . auth()->user()->profile->profile_picture) : asset('images/default-avatar.png') }}"
             alt="Avatar Preview"
             style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; display: block; margin: 0 auto 10px;">

        <!-- File Input Element -->
        <input type="file" name="avatar" id="avatar-input" accept="image/*" class="form-control @error('avatar') is-invalid @enderror">

        @error('avatar')
            <span class="invalid-feedback" role="alert" style="color: red; display: block; margin-top: 5px;">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Rest of profile fields -->
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', auth()->user()->profile->first_name ?? '') }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', auth()->user()->profile->last_name ?? '') }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone', auth()->user()->profile->phone ?? '') }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="{{ old('address', auth()->user()->profile->address ?? '') }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary" style="margin-top: 15px;">Save Profile</button>
        </form>

<script>
    document.getElementById('avatar-input').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            // Instantly updates the preview image frame before form submission
            document.getElementById('avatar-preview').src = URL.createObjectURL(file);
        }
    });
</script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

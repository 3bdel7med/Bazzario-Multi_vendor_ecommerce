@extends('layouts.admin')

@section('title')
Create Tag
@endsection

@section('content')
<div class="container mt-5">
    <h1>Create Tag</h1>
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Tag</button>
    </form>
</div>
@endsection

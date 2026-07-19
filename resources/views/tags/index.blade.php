@extends('layouts.admin')
@section('title')
Tags
@endsection
@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tags</h1>
        <a href="{{ route('tags.create') }}" class="btn btn-primary">Add New Tag</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tags->links() }}

@endsection

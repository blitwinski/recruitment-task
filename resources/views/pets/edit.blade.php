@extends('layout.app')
@section('content')
    <div class="container mt-4">
        <h1>Edit</h1>
        <form action="{{ route('pets.update', $pets['id'] ?? '') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $pets['name'] ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo URL</label>
                <input type="text" class="form-control" id="photo" name="photo" value="{{ $pets['photoUrls'][0] ?? '' }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

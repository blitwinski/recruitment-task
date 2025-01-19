@extends('layout.app')
@section('content')
    <div class="container mt-4">
        <h1>Pets</h1>
        <div class="table-responsive mt-3">
            <table class="table table-striped">
                @include('pets.create')
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Photo URLs</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($pets as $pet)
                    <tr>
                        <td>{{ $pet['id'] ?? ''}}</td>
                        <td>{{ $pet['name'] ?? ''}}</td>
                        <td>{{ $pet['status'] ?? ''}}</td>
                        <td>
                            <a href="{{ $pet['photoUrls'][0] ?? ''}}" target="_blank">
                            {{ $pet['photoUrls'][0] ?? ''}}</a></td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('pets.edit', $pet['id'] ?? '') }}" class="btn btn-sm btn-primary me-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('pets.destroy', $pet['id'] ?? '') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

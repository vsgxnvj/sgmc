<!-- resources/views/testimonies/index.blade.php -->
@extends('layouts.app')

@push('styles')
<!-- Add Bootstrap CSS if not already included -->

@endpush

@section('content')
<div class="container my-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-4">
        <h1 class="mb-3 mb-md-0">Testimonies</h1>
        <a href="{{ route('testimonies.create') }}" class="btn btn-primary">Add New</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('testimonies.index') }}" method="GET" class="mb-4 d-flex flex-column flex-sm-row gap-2">
        <input type="text" name="search" class="form-control" placeholder="Search by name or title">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($testimonies as $testimony)
        <div class="col">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $testimony->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $testimony->title }}</h6>
                    <p class="card-text flex-grow-1">{{ $testimony->message }}</p>
                    <div class="d-flex gap-2 mt-2">
                        <a href="{{ route('testimonies.edit', $testimony->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('testimonies.destroy', $testimony->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimony?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <a href="{{ route('testimonies.show', $testimony->id) }}" class="btn btn-info btn-sm">View</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $testimonies->links() }}
    </div>
</div>
@endsection

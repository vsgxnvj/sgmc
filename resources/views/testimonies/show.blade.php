<!-- resources/views/testimonies/show.blade.php -->
@extends('layouts.app')

@push('styles')

@endpush

@section('content')
<div class="container my-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Testimony Details</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <h4 class="card-title">{{ $testimony->name }}</h4>
                <br>
                @if($testimony->title)
                    <h6 class="card-subtitle mb-2 text-muted">{{ $testimony->title }}</h6>
                @endif
            </div>
            <div class="mb-3">
                <p class="card-text">{{ $testimony->message }}</p>
            </div>
            <div class="mb-3">
                <span class="badge {{ $testimony->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $testimony->is_active ? 'Active' : 'Inactive' }}</span>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('testimonies.index') }}" class="btn btn-outline-secondary">Back</a>
                <a href="{{ route('testimonies.edit', $testimony->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection

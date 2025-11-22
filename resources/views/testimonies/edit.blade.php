<!-- resources/views/testimonies/edit.blade.php -->
@extends('layouts.app')

@push('styles')

@endpush

@section('content')
<div class="container my-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">Edit Testimony</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('testimonies.update', $testimony->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name', $testimony->name) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" value="{{ old('title', $testimony->title) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="4" required>{{ old('message', $testimony->message) }}</textarea>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input" id="isActive" {{ $testimony->is_active ? 'checked' : '' }}>
                    <label class="form-check-label" for="isActive">Active</label>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('testimonies.index') }}" class="btn btn-secondary ms-2">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

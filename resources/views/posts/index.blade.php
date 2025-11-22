<!-- posts/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Blog Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary px-4">+ Create Post</a>
    </div>

    <table class="table table-bordered table-hover text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Featured Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $index => $post)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if ($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}"
                             style="height: 50px; width: auto; object-fit: cover;"
                             class="rounded" />
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-outline-primary btn-sm">
                        Read More
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this post?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

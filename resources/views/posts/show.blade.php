<!-- posts/show.blade.php -->
@extends('layouts.app')


@section('content')
    <div class="container py-4">
        <div class="mb-4">
            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary btn-sm">← Back</a>
        </div>


        <h1 class="fw-bold mb-2">{{ $post->title }}</h1>
        <p class="text-muted mb-4">By {{ $post->author }} | {{ $post->created_at->format('M d, Y') }} | Category:
            {{ $post->category }}</p>


        @if ($post->featured_image)
            <img src="{{ asset('storage/' . $post->featured_image) }}" class="img-fluid rounded mb-4 shadow-sm" />
        @endif


        <article class="fs-5 text-dark" style="line-height: 1.7;">
            {!! $post->content !!}
        </article>


        <hr class="my-4">
        <p class="text-secondary">Tags: <strong>{{ $post->tags }}</strong></p>
    </div>
@endsection

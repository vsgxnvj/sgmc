@extends('layouts2.p-layouts')

@section('content')

<div class="container my-5">


<h1 class="mb-4 text-center">SEO Pages</h1>

{{-- Search --}}
<div class="d-flex justify-content-center mb-4">
    <form class="d-flex w-50" method="GET" action="{{ route('page.index') }}">
        <input class="form-control me-2" type="search" name="search" placeholder="Search by title or category" value="{{ request('search') }}">
        <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
</div>

{{-- Blog Cards --}}
<div class="card-wrapper">
    @forelse($pages as $page)
        <div class="card">
            {{-- Optional image --}}
            @if($page->og_image)
                <div class="image">
                    <img src="{{ $page->og_image }}" alt="{{ $page->title }}">
                </div>
            @endif

            {{-- Card content --}}
            <div class="p-3 d-flex flex-column flex-grow-1">
                <h4 class="mb-2">{{ $page->title }}</h4>
                <p class="text-muted mb-2"><strong>Category:</strong> {{ $page->category }}</p>
                <p class="mb-3">{!! Str::limit($page->meta_description, 100) !!}</p>
                <a href="{{ route('page.show', $page->slug) }}" class="btn btn-primary mt-auto">Read More</a>
            </div>


        </div>
    @empty
        <p class="text-center">No pages found.</p>
    @endforelse
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-center mt-4">
    {{ $pages->links() }}
</div>


</div>
@endsection

@extends('layouts.app')

@push('styles')
    <style>

    </style>
@endpush

@section('content')
<div class="container">
    <h2 class="text-white mb-3">Sites</h2>
    <a href="{{ route('cards.create') }}" class="btn btn-primary mb-3">+ Add Sites</a>

    <div class="container my-4">
        <div class="row g-4">
            @foreach ($cards as $card)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card shadow-lg h-100 border-0 rounded-3 overflow-hidden">

                        <!-- Status -->
                        <div class="status text-center py-1 {{ strtolower($card->status) }}">
                            {{ strtoupper($card->status) }}
                        </div>

                        <!-- Image -->
                        <div class="image-wrapper">
                            <img src="{{ asset($card->image) }}"
                                 alt="{{ $card->title }}"
                                 class="card-img-top"
                                 style="height: 160px; object-fit: cover;">
                        </div>

                        <!-- Body -->
                        <div class="card-body d-flex flex-column text-center">

                            <h5 class="card-title text-dark fw-bold">{{ $card->title }}</h5>

                            <!-- Optional Description -->
                            @if ($card->description)
                                <p class="text-muted small">{{ $card->description }}</p>
                            @endif

                            <!-- Play Button -->
                            <a href="{{ $card->link }}" target="_blank" class="btn btn-sm btn-primary my-2">
                                PLAY
                            </a>

                            <!-- Reflink Button -->
                            <a href="{{ $card->reflink }}"
                               target="_blank"
                               class="btn btn-sm btn-success mb-2">
                                REF LINK
                            </a>

                            <!-- Actions -->
                            <div class="mt-auto d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                                <a href="{{ route('cards.edit', $card) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('cards.destroy', $card) }}" method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger w-100">Delete</button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection

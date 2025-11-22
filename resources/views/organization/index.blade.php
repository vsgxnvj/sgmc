@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Organization Info</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($organization)
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3 text-center">
                            @if ($organization->logo)
                                <img src="{{ asset('storage/' . $organization->logo) }}" alt="{{ $organization->name }}"
                                    class="img-fluid rounded">
                            @else
                                <div class="text-muted">No Logo</div>
                            @endif
                        </div>
                        <div class="col-md-9">
                            <h4>{{ $organization->name }}</h4>
                            <p><strong>Website:</strong> <a href="{{ $organization->url }}"
                                    target="_blank">{{ $organization->url }}</a></p>
                            @if ($organization->same_as)
                                <p><strong>Social:</strong>
                                    @foreach (json_decode($organization->same_as) as $social)
                                        <a href="{{ $social }}" target="_blank">{{ $social }}</a>
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </p>
                            @endif

                            <p><strong>Telephone:</strong> {{ $organization->telephone ?? '-' }}</p>
                            <p><strong>Contact Type:</strong> {{ $organization->contact_type ?? '-' }}</p>
                            <p><strong>Area Served:</strong> {{ $organization->area_served ?? '-' }}</p>
                            <p><strong>Language:</strong> {{ $organization->language ?? '-' }}</p>
                            <a href="{{ route('organization.edit', $organization) }}" class="btn btn-warning mt-2">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p>No organization info yet. <a href="{{ route('organization.create') }}">Create one</a></p>
        @endif
    </div>
@endsection

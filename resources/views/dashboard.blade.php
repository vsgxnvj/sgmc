{{-- if auth !role === 9 then redirect to / --}}
@if(!auth()->check() || auth()->user()->role != 999)
    <script>window.location = "/";</script>
    @php exit; @endphp
@endif

@extends('layouts.app')

@section('content')
    <h1>Cards List</h1>
@endsection

@push('styles')
    <style>

    </style>
@endpush

@push('scripts')
    <script>

    </script>
@endpush

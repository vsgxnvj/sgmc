@extends('layouts.app')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Edit</a></li>
    <li class="breadcrumb-item active" aria-current="page">Mode of Payment</li>
@endsection

@section('content')
<div class="container">
    <h2>Edit Mode of Payment</h2>

    <form action="{{ route('mop.update', $mop) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('mop.form')
    </form>
</div>
@endsection

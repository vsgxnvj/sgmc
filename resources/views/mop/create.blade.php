@extends('layouts.app')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Create</a></li>
    <li class="breadcrumb-item active" aria-current="page">Mode of Payment</li>
@endsection

@section('content')
<div class="container">
    <h2>Add Mode of Payment</h2>

    <form action="{{ route('mop.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('mop.form')
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Frequently Asked Questions</h2>
    <a href="{{ route('faq.create') }}" class="btn btn-success mb-3">+ Add FAQ</a>

    @foreach($faqs as $faq)
        <div class="card mb-2">
            <div class="card-header">
                {{ $faq->question }}
            </div>
            <div class="card-body">
                <p>{{ $faq->answer }}</p>
                <a href="{{ route('faq.edit', $faq) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('faq.destroy', $faq) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection

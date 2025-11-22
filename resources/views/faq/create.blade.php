@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add FAQ</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('faq.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Question</label>
            <input type="text" name="question" class="form-control" value="{{ old('question') }}" required>
        </div>

        <div class="mb-3">
            <label>Answer</label>
            <textarea name="answer" class="form-control" rows="5" required>{{ old('answer') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('faq.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

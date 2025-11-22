@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit FAQ</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('faq.update', $faq) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Question</label>
            <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question) }}" required>
        </div>

        <div class="mb-3">
            <label>Answer</label>
            <textarea name="answer" class="form-control" rows="5" required>{{ old('answer', $faq->answer) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('faq.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

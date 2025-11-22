@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-white mb-3">Edit Card</h2>

    <form action="{{ route('cards.update', $card) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Status -->
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="online" {{ $card->status == 'online' ? 'selected' : '' }}>Online</option>
                <option value="offline" {{ $card->status == 'offline' ? 'selected' : '' }}>Offline</option>
            </select>
        </div>

        <!-- Title -->
        <div class="mb-3">
            <label>Title</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ $card->title }}">
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label>Image</label><br>

            @if($card->image)
                <img src="{{ asset($card->image) }}"
                     width="120"
                     class="mb-2 rounded border">
            @endif

            <input type="file" name="image" class="form-control">
        </div>

        <!-- Link -->
        <div class="mb-3">
            <label>Main Link (PLAY)</label>
            <input type="url"
                   name="link"
                   class="form-control"
                   value="{{ $card->link }}">
        </div>

        <!-- Reflink -->
        <div class="mb-3">
            <label>Referral Link</label>
            <input type="url"
                   name="reflink"
                   class="form-control"
                   value="{{ $card->reflink }}">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description"
                      class="form-control"
                      rows="3">{{ $card->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

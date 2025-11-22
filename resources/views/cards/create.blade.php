@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-white mb-3">Add Card</h2>

    <form action="{{ route('cards.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Status -->
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="online">Online</option>
                <option value="offline">Offline</option>
            </select>
        </div>

        <!-- Title -->
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <!-- Main Link -->
        <div class="mb-3">
            <label>Main Link (PLAY)</label>
            <input type="url" name="link" class="form-control">
        </div>

        <!-- Reflink -->
        <div class="mb-3">
            <label>Referral Link</label>
            <input type="url" name="reflink" class="form-control">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection

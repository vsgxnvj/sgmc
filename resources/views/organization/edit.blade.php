@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Organization</h2>
    <form action="{{ route('organization.update', $organization) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $organization->name) }}" required>
        </div>

        <div class="mb-3">
            <label>Logo</label><br>
            @if($organization->logo)
                <img src="{{ asset('storage/' . $organization->logo) }}" alt="{{ $organization->name }}" width="120" class="mb-2">
            @endif
            <input type="file" name="logo" class="form-control">
        </div>

        <div class="mb-3">
            <label>Website URL</label>
            <input type="url" name="url" class="form-control" value="{{ old('url', $organization->url) }}" required>
        </div>

        <div class="mb-3">
            <label>Social Profiles (comma separated)</label>
          <input type="text" name="same_as" class="form-control" 
       value="{{ old('same_as', $organization->same_as ? implode(',', json_decode($organization->same_as)) : '') }}">
            <small class="text-muted">Separate multiple URLs with commas.</small>
        </div>

        <div class="mb-3">
            <label>Telephone</label>
            <input type="text" name="telephone" class="form-control" value="{{ old('telephone', $organization->telephone) }}">
        </div>

        <div class="mb-3">
            <label>Contact Type</label>
            <input type="text" name="contact_type" class="form-control" value="{{ old('contact_type', $organization->contact_type) }}">
        </div>

        <div class="mb-3">
            <label>Area Served</label>
            <input type="text" name="area_served" class="form-control" value="{{ old('area_served', $organization->area_served) }}">
        </div>

        <div class="mb-3">
            <label>Language</label>
            <input type="text" name="language" class="form-control" value="{{ old('language', $organization->language) }}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection

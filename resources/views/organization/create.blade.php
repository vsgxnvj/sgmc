@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Organization</h2>

    <form action="{{ route('organization.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control">
        </div>

        <div class="mb-3">
            <label>Website URL</label>
            <input type="url" name="url" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Social Profiles (comma separated)</label>
            <input type="text" name="same_as[]" class="form-control">
        </div>

        <div class="mb-3">
            <label>Telephone</label>
            <input type="text" name="telephone" class="form-control">
        </div>

        <div class="mb-3">
            <label>Contact Type</label>
            <input type="text" name="contact_type" class="form-control">
        </div>

        <div class="mb-3">
            <label>Area Served</label>
            <input type="text" name="area_served" class="form-control">
        </div>

        <div class="mb-3">
            <label>Language</label>
            <input type="text" name="language" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>SEO Pages</h1>
        <a href="{{ route('pages.create') }}" class="btn btn-success">Create New Page</a>
    </div>


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Category</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pages as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>{{ $page->category }}</td>
                    <td class="text-center">
                        <a href="{{ route('pages.show', $page->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this page?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No pages found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


</div>
@endsection

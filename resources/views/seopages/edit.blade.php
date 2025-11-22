@extends('layouts.app')

@section('content')

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mb-4">Edit SEO Page</h1>
            <a href="{{ route('pages.index') }}" class="btn btn-success">Return</a>
        </div>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <form action="{{ route('pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $page->title) }}"
                        required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{ old('slug', $page->slug) }}"
                        required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Meta Description</label>
                    <input type="text" class="form-control" name="meta_description"
                        value="{{ old('meta_description', $page->meta_description) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Focus Keywords</label>
                    <input type="text" class="form-control" name="focus_keywords"
                        value="{{ old('focus_keywords', $page->focus_keywords) }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Secondary Keywords</label>
                    <input type="text" class="form-control" name="secondary_keywords"
                        value="{{ old('secondary_keywords', $page->secondary_keywords) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">H1</label>
                    <input type="text" class="form-control" name="h1" value="{{ old('h1', $page->h1) }}">
                </div>
            </div>

            <!-- OG Tags -->
            <h5>OG Tags</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">OG Title</label>
                    <input type="text" class="form-control" name="og_title"
                        value="{{ old('og_title', $page->og_title) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">OG Description</label>
                    <input type="text" class="form-control" name="og_description"
                        value="{{ old('og_description', $page->og_description) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">OG Image URL</label>
                    <input type="text" class="form-control" name="og_image"
                        value="{{ old('og_image', $page->og_image) }}">
                </div>
            </div>

            <!-- Twitter Tags -->
            <h5>Twitter Tags</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Twitter Title</label>
                    <input type="text" class="form-control" name="twitter_title"
                        value="{{ old('twitter_title', $page->twitter_title) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Twitter Description</label>
                    <input type="text" class="form-control" name="twitter_description"
                        value="{{ old('twitter_description', $page->twitter_description) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Twitter Image URL</label>
                    <input type="text" class="form-control" name="twitter_image"
                        value="{{ old('twitter_image', $page->twitter_image) }}">
                </div>
            </div>

            <!-- Full Description & JSON Fields -->
            <div class="mb-3">
                <label class="form-label">Full Description</label>
                <textarea class="form-control" rows="4" name="full_description">{{ old('full_description', $page->full_description) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">FAQ Schema (JSON)</label>
                <textarea class="form-control" rows="3" name="faq_schema">{{ old('faq_schema', $page->faq_schema) }}</textarea>
            </div>


            @php
                $pageData = [
                    '@context' => 'https://schema.org',
                    '@type' => 'WebPage',
                    'name' => $page->title,
                    'description' => $page->meta_description,
                    'url' => $page->link,
                    'image' => $page->og_image ?: $page->gallery[0] ?? null,
                    'video' => $page->video
                        ? [
                            '@type' => 'VideoObject',
                            'name' => $page->title,
                            'description' => $page->meta_description,
                            'contentUrl' => $page->video,
                        ]
                        : null,
                ];
            @endphp



            <div class="mb-3"> <label class="form-label">JSON-LD Schema</label>
                <textarea class="form-control" rows="3" id="json_ld" name="json_ld">
                    <script type="application/ld+json">
                        {!! json_encode($pageData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
                    </script>
                </textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Gallery (JSON)</label>
                <textarea class="form-control" rows="2" name="gallery">{{ old('gallery', json_encode($page->gallery)) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">ALT Texts (JSON Array)</label>
                <textarea class="form-control" rows="2" name="alt_texts">{{ old('alt_texts', json_encode($page->alt_texts)) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Video URL</label>
                <input type="text" class="form-control" name="video" value="{{ old('video', $page->video) }}">
            </div>

            <!-- Custom Fields -->
            <h5>Custom Fields</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Registration Type</label>
                    <input type="text" class="form-control" name="registration_type"
                        value="{{ old('registration_type', $page->registration_type) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Cash-in Method</label>
                    <input type="text" class="form-control" name="cashin_method"
                        value="{{ old('cashin_method', $page->cashin_method) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Cash-out Method</label>
                    <input type="text" class="form-control" name="cashout_method"
                        value="{{ old('cashout_method', $page->cashout_method) }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label class="form-label">Link</label>
                    <input type="text" class="form-control" name="link" value="{{ old('link', $page->link) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Category</label>
                    <input type="text" class="form-control" name="category"
                        value="{{ old('category', $page->category) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Plasada</label>
                    <input type="text" class="form-control" name="plasada"
                        value="{{ old('plasada', $page->plasada) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Agent Contact Link</label>
                    <input type="text" class="form-control" name="agent_contact_link"
                        value="{{ old('agent_contact_link', $page->agent_contact_link) }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Page</button>
            <a href="{{ route('pages.index') }}" class="btn btn-secondary">Cancel</a>
        </form>


    </div>
@endsection

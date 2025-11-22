@extends('layouts.app')

@section('content')

<div class="container py-4">

     <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mb-4">SHOW SEO Page</h1>
            <a href="{{ route('pages.index') }}" class="btn btn-secondary">Back to Pages</a>
        </div>



    <h1 class="mb-3">{{ $page->title }}</h1>



<div class="mb-4">
    <p><strong>Slug:</strong> {{ $page->slug }}</p>
    <p><strong>Meta Description:</strong> {{ $page->meta_description }}</p>
    <p><strong>Focus Keywords:</strong> {{ $page->focus_keywords }}</p>
    <p><strong>Category:</strong> {{ $page->category }}</p>
</div>

<h3>OG Tags</h3>
<div class="mb-4">
    <p><strong>OG Title:</strong> {{ $page->og_title }}</p>
    <p><strong>OG Description:</strong> {{ $page->og_description }}</p>
    <p><strong>OG Image:</strong> {{ $page->og_image }}</p>
</div>

<h3>Twitter Tags</h3>
<div class="mb-4">
    <p><strong>Twitter Title:</strong> {{ $page->twitter_title }}</p>
    <p><strong>Twitter Description:</strong> {{ $page->twitter_description }}</p>
    <p><strong>Twitter Image:</strong> {{ $page->twitter_image }}</p>
</div>

<h3>Content</h3>
<div class="mb-4">
    <p><strong>H1:</strong> {{ $page->h1 }}</p>
    <p><strong>Full Description:</strong></p>
    <div class="border p-3 bg-light">{!! nl2br(e($page->full_description)) !!}</div>
</div>

<h3>Custom Fields</h3>
<div class="mb-4">
    <p><strong>Registration Type:</strong> {{ $page->registration_type }}</p>
    <p><strong>Cash-in Method:</strong> {{ $page->cashin_method }}</p>
    <p><strong>Cash-out Method:</strong> {{ $page->cashout_method }}</p>
    <p><strong>Link:</strong> {{ $page->link }}</p>
    <p><strong>Plasada:</strong> {{ $page->plasada }}</p>
    <p><strong>Agent Contact Link:</strong> {{ $page->agent_contact_link }}</p>
</div>

<a href="{{ route('pages.index') }}" class="btn btn-secondary">Back to Pages</a>


</div>
@endsection

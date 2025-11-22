@extends('layouts2.p-layouts')

@section('content')

<div class="container my-5">


<a href="{{ route('page.index') }}" class="btn btn-secondary mb-3" style="background:#111; color:#00EAFF; border:1px solid #00EAFF; box-shadow:0 0 6px #00EAFF;">Back to Pages</a>

{{-- Page Card --}}
<div class="card" style="background:#0a0a0a; border:2px solid #00EAFF; box-shadow:0 0 10px #00EAFF, inset 0 0 4px rgba(0,234,255,0.2); border-radius:12px;">
    <div class="p-3">
        <h1 style="color:#00EAFF; font-family:'Montserrat', sans-serif;">{{ $page->title }}</h1>
        <p class="text-muted mb-2" style="color:#ccc;"><strong>Category:</strong> {{ $page->category }}</p>
        {{-- <p style="color:#cceeff;">{!! nl2br(e($page->meta_description)) !!}</p> --}}
    </div>

    <div class="p-3 border-top" style="border-color:#00EAFF;">


        <div class="p-3 mb-4" style="border-color:#00EAFF; color:#cceeff;">
            {!! nl2br(e($page->full_description)) !!}
        </div>
    </div>

    {{-- Gallery --}}
    @if($page->gallery)
        @php $images = json_decode($page->gallery, true); @endphp
        @if(!empty($images))
            <div class="p-3 border-top" style="border-color:#00EAFF;">
                <h4 style="color:#00EAFF;">Gallery</h4>
                <div id="galleryCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($images as $key => $img)
                            <div class="carousel-item @if($key == 0) active @endif">
                                <img src="{{ $img }}" class="d-block w-100" style="max-height:400px; object-fit:cover; border:1px solid #00EAFF; box-shadow:0 0 6px #00EAFF;" alt="{{ $page->alt_texts[$key] ?? '' }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        @endif
    @endif

    <div class="p-3 border-top" style="border-color:#00EAFF;">
        <h4 style="color:#00EAFF;">Details</h4>
        <ul class="list-group mb-4" style="border-color:#00EAFF; background:#111; color:#cceeff;">
            <li class="list-group-item" style="background:transparent; color:#cceeff;"><strong>Registration Type:</strong> {{ $page->registration_type }}</li>
            <li class="list-group-item" style="background:transparent; color:#cceeff;"><strong>Cash-in Method:</strong> {{ $page->cashin_method }}</li>
            <li class="list-group-item" style="background:transparent; color:#cceeff;"><strong>Cash-out Method:</strong> {{ $page->cashout_method }}</li>
            <li class="list-group-item" style="background:transparent; color:#cceeff;"><strong>Link:</strong> <a href="{{ $page->link }}" target="_blank" style="color:#00EAFF;">{{ $page->link }}</a></li>
            <li class="list-group-item" style="background:transparent; color:#cceeff;"><strong>Plasada:</strong> {{ $page->plasada }}</li>
            <li class="list-group-item" style="background:transparent; color:#cceeff;"><strong>Agent Contact Link:</strong> <a href="{{ $page->agent_contact_link }}" target="_blank" style="color:#00EAFF;">{{ $page->agent_contact_link }}</a></li>
        </ul>
    </div>
</div>
```

</div>

@endsection

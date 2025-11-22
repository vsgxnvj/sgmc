<section id="gallery">
    <div class="gallery-title">
        <h2>Gallery Daily Banner</h2>
    </div>
    <div class="container">
        <div class="gallery-container">
            @foreach(range(1,4) as $i)
                <a href="{{ asset('images/team-hayahay-logo-2.png') }}" data-lightbox="team-gallery" data-title="Team Hayahay Event {{ $i }}">
                    <img src="{{ asset('images/team-hayahay-logo-2.png') }}" alt="Event {{ $i }}">
                </a>
            @endforeach
        </div>
    </div>
</section>

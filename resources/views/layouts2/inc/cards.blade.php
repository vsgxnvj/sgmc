<div class="container my-4">
    @php
        $onlineCards = $cards->where('status', 'online');
        $offlineCards = $cards->where('status', 'offline');
    @endphp

    {{-- ONLINE SECTION --}}
    @if ($onlineCards->count())
        <h2 class="text-success fw-bold mb-3">ONLINE SITES</h2>
        <div class="row g-4">
            @foreach ($onlineCards as $card)
                <div class="col-6 col-md-4 col-lg-3">
                    <article class="card shadow-lg h-100 border-0 rounded-3 overflow-hidden">
                        <div class="status-badge online-status text-center py-1">ONLINE</div>

                        <a href="{{ $card->link }}" target="_blank" rel="nofollow noopener">
                            <img src="{{ asset($card->image) }}"
                                alt="{{ $card->title }} - {{ $card->description ?? '' }}"
                                class="card-img-top"
                                style="height:160px;object-fit:cover;">
                        </a>

                        <div class="card-body text-center">
                            <h3 class="card-title" style="font-size: 1.1em">{{ strtoupper($card->title) }}</h3>

                            @if ($card->description)
                                <p class="text-muted small">
                                    <span class="short-text">{{ Str::limit($card->description, 1) }}</span>
                                    <span class="full-text d-none">{{ $card->description }}</span>

                                    @if (Str::length($card->description) > 1)
                                        <a href="javascript:void(0)" class="read-more">Read more</a>
                                    @endif
                                </p>
                            @endif

                            <a href="{{ $card->link }}" target="_blank" rel="nofollow noopener"
                                class="btn btn-success btn-sm w-100 mb-1 btn-block btn-lg">PLAY NOW</a>

                            <a href="{{ $card->reflink }}" target="_blank" rel="nofollow noopener"
                                class="btn btn-outline-secondary btn-sm w-100 btn-block btn-lg">REGISTER</a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    @endif


    {{-- OFFLINE SECTION --}}
    @if ($offlineCards->count())
        <h2 class="text-danger fw-bold mt-5 mb-3">OFFLINE SITES</h2>
        <div class="row g-4">
            @foreach ($offlineCards as $card)
                <div class="col-6 col-md-4 col-lg-3">
                    <article class="card shadow h-100 border-0 rounded-3 overflow-hidden opacity-75">
                        <div class="status-badge neon-offline text-center py-1">OFFLINE</div>

                        <img src="{{ asset($card->image) }}"
                            alt="{{ $card->title }} - {{ $card->description ?? '' }}"
                            class="card-img-top"
                            style="height:160px;object-fit:cover;filter:grayscale(1);">

                        <div class="card-body text-center">
                            <h3 class="card-title" style="font-size: 1.1em">{{ strtoupper($card->title) }}</h3>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    @endif
</div>

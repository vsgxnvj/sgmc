<section id="testimonials-sugal">
    <div class="section-title">
        <h2>TESTIMONY</h2>
    </div>
    <div class="container">
        <div class="glide" id="glide-testimonials">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach ($testimonies as $testimony)
                        <li class="glide__slide">
                            <div class="testimonial-card">
                                <img src="https://cdn-icons-png.flaticon.com/512/219/219983.png" alt="{{ $testimony->name }}">
                                <p>"{{ $testimony->message }}"</p>
                                <strong>- {{ $testimony->name }}</strong>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="glide__bullets" data-glide-el="controls[nav]">
                @foreach ($testimonies as $index => $testimony)
                    <button class="glide__bullet" data-glide-dir="={{ $index }}"></button>
                @endforeach
            </div>
        </div>
    </div>
</section>

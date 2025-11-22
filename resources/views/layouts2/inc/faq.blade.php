<section id="faq">
    <div class="faq-title">
        <h2>Frequently Asked Questions (FAQ)</h2>
    </div>
    <div class="faq-container">
        @foreach ($faqs as $faq)
            <div class="faq-card">
                <div class="faq-question">
                    {{ $faq->question }}
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>{!! nl2br(e($faq->answer)) !!}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>



    <!-- Bootstrap 5 JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Particles.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

    <!-- Particles.js Config -->
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 45,
                    "density": {
                        "enable": true,
                        "value_area": 900
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle"
                },
                "opacity": {
                    "value": 0.4,
                    "random": false
                },
                "size": {
                    "value": 3,
                    "random": true
                },
                "line_linked": {
                    "enable": true,
                    "distance": 130,
                    "color": "#ffffff",
                    "opacity": 0.25,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2.2,
                    "out_mode": "out"
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": false
                    },
                    "onclick": {
                        "enable": false
                    },
                    "resize": true
                }
            },
            "retina_detect": true
        });
    </script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const readMoreLinks = document.querySelectorAll('.read-more');
        readMoreLinks.forEach(link => {
            link.addEventListener('click', function() {
                const parent = this.parentElement;
                parent.querySelector('.short-text').classList.toggle('d-none');
                parent.querySelector('.full-text').classList.toggle('d-none');
                this.textContent = this.textContent === 'Read more' ? 'Read less' : 'Read more';
            });
        });
    });
</script>


    <script>
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const galleryImages = document.querySelectorAll('.gallery-item img');
        const closeBtn = document.querySelector('.close');

        galleryImages.forEach(img => {
            img.addEventListener('click', () => {
                lightbox.style.display = 'block';
                lightboxImg.src = img.src;
            });
        });

        closeBtn.addEventListener('click', () => {
            lightbox.style.display = 'none';
        });

        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.style.display = 'none';
            }
        });
    </script>

    <script>
        const faqCards = document.querySelectorAll('.faq-card');

        faqCards.forEach(card => {
            card.querySelector('.faq-question').addEventListener('click', () => {
                const answer = card.querySelector('.faq-answer');
                const toggle = card.querySelector('.faq-toggle');
                const isOpen = answer.style.display === 'block';

                // Close all
                document.querySelectorAll('.faq-answer').forEach(a => a.style.display = 'none');
                document.querySelectorAll('.faq-toggle').forEach(t => t.textContent = '+');

                // Toggle current
                if (!isOpen) {
                    answer.style.display = 'block';
                    toggle.textContent = '−';
                }
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Glide('#glide-testimonials', {
                type: 'slider', // Non-looping slider
                perView: 2, // Show 3 testimonials at once
                focusAt: 'center',
                gap: 10, // Space between slides in pixels
                autoplay: 4000, // Auto-advance every 4 seconds

                // Responsive settings for smaller screens
                breakpoints: {
                    992: { // Tablet screens
                        perView: 2,
                        gap: 5
                    },
                    576: { // Mobile screens
                        perView: 1, // Show only 1 testimonial at a time
                        gap: 5
                    }
                }
            }).mount();
        });
    </script>


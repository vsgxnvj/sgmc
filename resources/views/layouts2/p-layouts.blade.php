<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

        <title>##</title>


        <link rel="canonical" href="{{ url()->current() }}">


        <link rel="stylesheet" href="{{ asset('build/custom.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


        <link href="https://cdn.jsdelivr.net/npm/lightbox2/dist/css/lightbox.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/lightbox2/dist/js/lightbox-plus-jquery.min.js"></script>



    </head>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.theme.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/glide.min.js"></script>





</head>

<body>
    <!-- Particles.js Container -->
    <div id="particles-js"></div>

    <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background:#000; z-index: 1030;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">TEAM HAYAHAY</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="https://m.me/651565208039176" target="_blank">Cashin</a></li>
                @auth
                    @if (auth()->user()->role == 999)
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Admin Dashboard</a></li>
                    @endif
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-white p-0" style="text-decoration:none;">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<div style="margin-top: 70px;"></div>



      @yield('content')





    <footer id="footer">
        <div class="footer-container">
            <p>&copy; 2025 Team Hayahay. All Rights Reserved.</p>
            <div class="footer-links">
                <a href="#about">About Us</a> |
                <a href="#gallery">Gallery</a> |
                <a href="#contact">Contact</a>
            </div>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </footer>





    <!-- Fixed Bottom Neon Menu -->
    <footer class="bottom-nav">
        <a href="/" class="nav-item">
            <i class="fa-solid fa-house"></i>
            <span>Home</span>
        </a>

        <a href="https://m.me/651565208039176" target="_blank" class="nav-item">
            <i class="fa-solid fa-wallet"></i>
            <span>Cash In</span>
        </a>

        <a href="https://m.me/651565208039176" target="_blank" class="nav-item">
            <i class="fa-solid fa-money-bill-transfer"></i>
            <span>Withdraw</span>
        </a>

        <a href="https://m.me/651565208039176" target="_blank" class="nav-item">
            <i class="fa-solid fa-headset"></i>
            <span>Concern</span>
        </a>
    </footer>




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







</body>

</html>

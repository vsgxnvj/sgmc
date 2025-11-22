<!DOCTYPE html>
<html lang="en">
@include('layouts2.inc.head')
<body>
    <div id="particles-js"></div>
    @include('layouts2.inc.navbar')


    @yield('section')

    @include('layouts2.inc.cards')
    @include('layouts2.inc.about')
    @include('layouts2.inc.testimonials')
    @include('layouts2.inc.gallery')
    @include('layouts2.inc.faq')
    @include('layouts2.inc.footer')
    @include('layouts2.inc.bottom-nav')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {"value":45,"density":{"enable":true,"value_area":900}},
                "color":{"value":"#ffffff"},
                "shape":{"type":"circle"},
                "opacity":{"value":0.4,"random":false},
                "size":{"value":3,"random":true},
                "line_linked":{"enable":true,"distance":130,"color":"#ffffff","opacity":0.25,"width":1},
                "move":{"enable":true,"speed":2.2,"out_mode":"out"}
            },
            "interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":false},"onclick":{"enable":false},"resize":true}},
            "retina_detect":true
        });
    </script>

    @include('layouts2.inc.scripts')


</body>
</html>

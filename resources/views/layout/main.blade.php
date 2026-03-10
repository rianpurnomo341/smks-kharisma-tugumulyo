<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK KHARISMA TUGUMULYO</title>
    <link rel="icon" href="{{ asset('media-sistem/logoSMK.png') }}">

    {{-- bootstrap 5 --}}
    <link rel="stylesheet" href="{{ asset('asset/bootstrap-5/css/bootstrap.min.css') }}">

    {{-- bootstrap 4 --}}
    <link rel="stylesheet" href="{{ asset('asset/bootstrap-4/dist/css/bootstrap.min.css') }}">

    {{-- icon bootstrap --}}
    <link rel="stylesheet" href="{{ asset('asset/bootstrap-icon/font/bootstrap-icons.css') }}">

    {{-- run and typed js --}}
    <script src="{{ asset('asset/run_text/typed.js') }}"></script>

    {{-- carasual --}}
    <link rel="stylesheet" href="{{ asset('asset/carousel/owl.carousel.min.css') }}">

    {{-- scoll aos css --}}
    <link rel="stylesheet" href="{{ asset('asset/aos/aos.css') }}">

    {{-- front css --}}
    <link rel="stylesheet" href="{{ asset('asset/css/front-style.css') }}">

    <style>
        .index-berita-des {
            height: 110px;
            overflow: hidden;
            position: relative;
        }

        .berita-des {
            height: 100px;
            overflow: hidden;
            position: relative;
        }
    </style>

</head>

<body>
    {{-- navbar --}}
    @include('layout.navbar')

    {{-- content --}}
    @yield('content')

    {{-- footer --}}
    @include('layout.footer')

    {{-- bootstrap 4 --}}
    <script src="{{ asset('asset/bootstrap-4/dist/js/bootstrap.bundle.min.js') }}"></script>

    {{-- bootstrap 5 --}}
    <script src="{{ asset('asset/bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Jquery --}}
    <script src="{{ asset('asset/jquery/jquery-3.6.0.min.js') }}"></script>

    {{-- scroll nav hide --}}
    <script>
        var nav = document.querySelector('#nav-hide');
        var navClick = document.querySelector('.navbar-toggler-icon');

        if ({{ Request::is('/') }}) {
            navClick.addEventListener("click", function() {
                nav.classList.toggle('bg-success', 'shadow');
            });

            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 5) {
                    nav.classList.add('bg-success', 'shadow');
                } else {
                    nav.classList.remove('bg-success', 'shadow');
                }
            });
        }
    </script>

    {{-- run text --}}
    <script>
        var typed = new Typed('.runText', {
            strings: [
                "Man Jadda Wajada",
                "Kita bisa kerena kita hebat",
                "Pendidikan dapat mempertajam kecerdasan",
                "Memperkukuh kemauan",
                "Memperhalus perasaan"
            ],
            typeSpeed: 50,
            backSpeed: 50,
            loop: true
        });
    </script>

    {{-- carasual js --}}
    <script src="{{ asset('asset/carousel/owl.carousel.min.js') }}"></script>
    <script src="vendor/"></script>
    <script>
        $(".slide").owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 6000,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                900: {
                    items: 3,
                    nav: true,
                }
            }
        });
    </script>

    {{-- scoll aos js
    disable aos from android --}}
    <script src="{{ asset('asset/aos/aos.js') }}"></script>
    <script>
        AOS.init({
            duration: 1200
        });
    </script>

    {{-- nav hightlight --}}

</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/EstilosFooter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/botom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slide.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reserva.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aoo.rtl.css') }}">



    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}"> {{-- Favicon --}}




    <style>
        /*  .fondo {
            background: #f85032;
            background: -webkit-linear-gradient(to right, #e73827, #f85032);
            background: linear-gradient(to right, #e73827, #f85032);
        } */


        .reveal {
            position: relative;
            transform: translateY(150px);
            opacity: 0;
            transition: all 1s ease;
        }

        .reveal.active {
            transform: translateY(0px);
            opacity: 1;
        }

    </style>
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body {{ $attributes->merge(['class' => 'font-sans antialiased']) }}>

    <div class="min-h-screen fondo">

        <!-- Page Content -->
        <main>
            {{ $slot }}

        </main>

    </div>
    @stack('modals')

    @livewireScripts
    <script>
        var counter = 1;
        setInterval(function() {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if (counter > 4) {
                counter = 1;
            }
        }, 3000);

        window.addEventListener('scroll', reveal);

        function reveal() {
            var reveals = document.querySelectorAll('.reveal');

            for (var i = 0; i < reveals.length; i++) {

                var windowheight = window.innerHeight;
                var revealtop = reveals[i].getBoundingClientRect().top;
                var revealpoint = 30;

                if (revealtop < windowheight - revealpoint) {
                    reveals[i].classList.add('active');
                } else {
                    reveals[i].classList.remove('active');
                }
            }
        }

        function mover(element){
            element.classList.remove('animate__animated', 'animate__backInRight')
            element.classList.add('animate__animated', 'animate__heartBeat')
            setTimeout(function(){
                element.classList.remove('animate__animated', 'animate__heartBeat')
            },1000)

        }
    </script>
</body>

</html>

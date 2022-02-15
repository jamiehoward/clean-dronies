<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @if (config('app.env') !== 'local')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-VMB284K0DR"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-VMB284K0DR');
        </script>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MC9M7D8');</script>
        <!-- End Google Tag Manager -->
        @endif

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-mono antialiased bg-black">
        <div class="w-full" id="app">

            <nav class="text-white p-4 flex justify-between">
                <div class="font-bold uppercase">
                    <a href="/" class="hover:text-green-300 transition ease-in-out">
                        {{config('app.name')}}
                    </a>
                </div>
                <div>
                    <a href="{{route('top-dronies.index')}}" class="hover:text-green-300 transition ease-in-out">
                        Leaderboard
                    </a>
                </div>
            </nav>

            @yield('content')
            
            <div class="text-white text-center mt-8 text-sm">
                Want to be notified of updates? Follow <a href="https://twitter.com/intent/follow?screen_name=JamieHoward" target="_blank" class="text-red-500">@JamieHoward</a> on Twitter.
            </div>
        </div>


    </body>
</html>
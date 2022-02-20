<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="apple-touch-icon" href="/img/logo-mark.svg">
        <meta name="apple-mobile-web-app-title" content="Clean Dronies">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="icon" href="/img/logo-mark.svg">

        <title>{{ config('app.name', 'Laravel') }} | A community-sourced NFT rarity tool where votes translate into value.</title>

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
    <body class="font-mono antialiased bg-slate-900">
        <div class="w-full bg-slate-900" id="app">

            <nav class="text-white p-4 flex justify-between">
                <div class="font-bold uppercase">
                    <a href="/" class="hover:text-green-400 transition ease-in-out font-serif text-2xl flex items-center gap-2">
                        <div class="text-4xl md:text-2xl">🧼</div>
                        <div class="md:visible invisible">{{config('app.name')}}</div>
                    </a>
                </div>
                <div class="grid md:flex md:gap-6 gap-2 text-right font-bold uppercase">
                    <a href="#about" class="hover:text-green-300 transition ease-in-out">
                        About
                    </a>
                    <a href="{{route('top-dronies.index')}}" class="hover:text-green-300 transition ease-in-out">
                        Leaderboard
                    </a>
                </div>
            </nav>

            @yield('content')
            
            <div class="text-white text-center my-8 text-sm md:flex md:justify-between px-8">
                <div class="md:mb-0 mb-2">Built with <span class="text-red-500">♥️</span> by <a href="https://twitter.com/intent/follow?screen_name=JamieHoward" target="_blank" class="text-red-500 twitter-link">@JamieHoward</a>.</div>
                <div>Found this useful? Tips appreciated! <span id="donation-wallet" onClick="copyToClipboard('AEJfXj19antR3vVHbYem2wyaoqiPPHS2AySMy9EP9SnQ')" class="font-bold hover:text-gray-300 transition cursor-pointer">AEJ...SnQ</span></div>
            </div>
        </div>

        <script>
            function copyToClipboard(value) {
                var tempInput = document.createElement("input");
                tempInput.style = "position: absolute; left: -1000px";
                tempInput.value = value;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand("copy");

                alert("Copied to clipboard: " + value);
            }
        </script>
    </body>
</html>
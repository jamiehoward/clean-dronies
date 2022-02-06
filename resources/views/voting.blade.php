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

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-mono antialiased bg-black">
        <div class="w-full" id="app">

            <div class="mx-auto w-1/2 mt-16 text-center p-8 border-green-300 border-dotted border-2">
                <h1 class="font-bold text-lg mb-8 text-white uppercase">Which Dronie is cleaner?</h1>
                <dronie-voting-list></dronie-voting-list>
            </div>

            <dronie-leaderboard></dronie-leaderboard>
        </div>

    </body>
</html>
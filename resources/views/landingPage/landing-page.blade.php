<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Instagram</title>

      <!-- TODO: add instagram favicon -->
      <!-- TODO: add instagram font -->

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        <link href="{{asset('css/landing-page.css')}}" rel="stylesheet" />

        <!-- Scripts -->

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    </head>
    <body >
        <div class="container">
            <div class="login">
                @include('landingPage.phone')
                @include('landingPage.login')
            </div>
        </div>

    </body>
</html>

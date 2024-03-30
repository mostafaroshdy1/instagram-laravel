<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Instgram</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('homePage/sass/profile.css')}}">
        {{-- Uncomment To Show Navbar --}}
        <link rel="stylesheet" href="{{ asset('homePage/sass/nav.css') }}">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row vh-100">
                {{-- Nav Bar --}}
                <div class="col-2 text-white border-end">
                    {{-- Uncomment to Show Navbar --}}
                    @include('component/navbar')
                </div>

                {{-- Main Section --}}
                <div class="col">
                    @yield('content')
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
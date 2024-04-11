<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    <link rel="stylesheet" href="{{ asset('homePage/sass/vender/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('homePage/sass/vender/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homePage/owlcarousel/owl.theme.default.min.css') }}./">
    <link rel="stylesheet" href="{{ asset('homePage/owlcarousel/owl.carousel.min.css') }}.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">
    <link rel="stylesheet" href="{{ asset('homePage/sass/main.css') }}">
    <link rel="stylesheet" href="{{ asset('homePage/sass/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('homePage/sass/editnav.css') }}">

</head>

<body class="bg-black text-white">
    <div class="post_page">
        {{-- NavBar --}}
        @include('includes.navbar')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row vh-100">
                        @include('component.edit_navbar')
                        <div class="col-5 rounded mx-auto my-auto d-flex flex-column formcontainer">
                            {{-- @yield('content') --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>




      

    </div>
    <script src="{{ asset('homePage/js/navforms.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
    <script src="{{ asset('homePage/owlcarousel/jquery.min.js') }}"></script>
    <script src="{{ asset('homePage/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('homePage/js/carousel.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
    <script src="{{ asset('homePage/js/main.js') }}"></script>
    <script src="{{ asset('homePage/js/customProfile.js') }}"></script>

</body>

</html>

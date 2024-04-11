<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Instagram</title>
    <link rel="stylesheet" href="{{ asset('homePage/sass/vender/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('homePage/sass/vender/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homePage/owlcarousel/owl.theme.default.min.css') }}./">
    <link rel="stylesheet" href="{{ asset('homePage/owlcarousel/owl.carousel.min.css') }}.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">
    <link rel="stylesheet" href="{{ asset('homePage/sass/main.css') }}">
    <link rel="stylesheet" href="{{ asset('homePage/sass/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('postModal/css/style.css') }}">

</head>

<body class="bg-black text-white">
    <div class="post_page">
        {{-- NavBar --}}
        @include('includes.navbar')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row vh-100">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <!--Create model-->
        <div class="modal fade" id="create_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h1 class="modal-title w-100 fs-5 d-flex align-items-end justify-content-between"
                            id="exampleModalLabel">
                            <span class="title_create">Create new post</span>
                            <button class="next_btn_post btn_link"></button>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img class="up_load" src="./images/upload.png" alt="upload">
                        <p>Drag photos and videos here</p>
                        <button class="btn btn-primary btn_upload">
                            select from your computer
                            <form id="upload-form">
                                <input class="input_select" type="file" id="image-upload" name="image-upload">
                            </form>
                        </button>
                        <div id="image-container" class="hide_img">
                        </div>
                        <div id="image_description" class="hide_img">
                            <div class="img_p"></div>
                            <div class="description">
                                <div class="cart">
                                    <div>
                                        <div class="img">
                                            <img src="./images/profile_img.jpg">
                                        </div>
                                        <div class="info">
                                            <p class="name">Zineb_essoussi</p>
                                        </div>
                                    </div>
                                </div>
                                <form>
                                    <textarea type="text" id="emoji_create" placeholder="write your email"></textarea>
                                </form>
                            </div>
                        </div>
                        <div class="post_published hide_img">
                            <img src="./images/uploaded_post.gif" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>

    <script src="{{ asset('homePage/sass/vender/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('homePage/owlcarousel/jquery.min.js') }}"></script>
    <script src="{{ asset('homePage/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('homePage/js/carousel.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('homePage/js/main.js') }}"></script>
    <script src="{{ asset('homePage/js/customProfile.js') }}"></script>
    <script src="{{ asset('postModal/js/script.js') }}"></script>
    <script src="{{ asset('likes/js/likesShowModal.js') }}"></script>
    <script src="{{ asset('delete/js/delete.js') }}"></script>
    <script src="{{ asset('delete/js/deleteProfile.js') }}"></script>
    <script src="{{ asset('homePage/js/main.js') }}"></script>
    <script src="{{ asset('likes/js/likesSaved.js') }}"></script>
    <script src="{{ asset('tags/js/script.js') }}"></script>
</body>

</html>

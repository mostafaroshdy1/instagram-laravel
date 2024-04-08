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

    <link rel="stylesheet" href="{{ asset('homePage/owlcarousel/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('homePage/owlcarousel/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('tags/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('postModal/css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">

    {{-- from Roshdy: Uncomment this if you need bootstrap cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('homePage/sass/main.css') }}">
</head>

<body class="bg-black">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="post_page ">
        @include('includes.navbar')

        <div class="second_container d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="mb-4 header-text">Posts from #{{ $hashtag }}</h1>
                        <h5 class="header-text">Total Posts: {{ $posts->count() }}</h5>
                        <hr class="post-separator">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div id="posts_sec" class="post">
                            @foreach ($posts->chunk(3) as $chunk)
                                <div class="row">
                                    @foreach ($chunk as $post)
                                        <div class="col-lg-4 col-md-5 mb-4">
                                            <div class="item">
                                                @foreach ($post->images as $image)
                                                    <img id="{{ $post->id }}"
                                                        class="img-fluid item_img posts-img test"
                                                        src="{{ $image->url }}" alt=""
                                                        data-image-url="{{ $image->url }}">
                                                    @include('layouts.postModal')
                                                    @include('layouts.likes', ['post' => $post])
                                                    @include('layouts.deleteMenu', ['post' => $post])
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                    @for ($i = count($chunk); $i < 3; $i++)
                                        <div class="col-md-4"></div>
                                    @endfor
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for sending posts-->
            <div class="modal fade" id="send_message_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Share</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="send">
                                <div class="search_person">
                                    <p>To:</p>
                                    <input type="text" placeholder="Search">
                                </div>
                                <p>Suggested</p>
                                <div class="poeple">
                                    <div class="person">
                                        <div class="d-flex">
                                            <div class="img">
                                                <img src="{{ asset('homePage/images/profile_img.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="content">
                                                <div class="person">
                                                    <h4>namePerson</h4>
                                                    <span>zim ess</span>
                                                </div>
                                            </div>
                                        </div>
                                        <di class="circle">
                                            <span></span>
                                    </div>
                                </div>
                                <div class="person">
                                    <div class="d-flex">
                                        <div class="img">
                                            <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                                        </div>
                                        <div class="content">
                                            <div class="person">
                                                <h4>namePerson</h4>
                                                <span>zim ess</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="circle">
                                        <span></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Send</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Modal for add messages-->

            <!--Create model-->
            <div class="modal fade" id="create_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title w-100 fs-5 d-flex align-items-end justify-content-between"
                                id="exampleModalLabel">
                                <span class="title_create">Create new post</span>
                                <button class="next_btn_post btn_link"></button>
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img class="up_load" src="{{ asset('/homePage/images/upload.png') }}" alt="upload">
                            <p>Drag photos and videos here</p>
                            <button class="btn btn-primary btn_upload">
                                select from your computer
                                <form id="upload-form">
                                    <input multiple class="input_select" type="file" id="image-upload"
                                        name="image-upload">
                                </form>
                            </button>
                            <div id="image-container" class="hide_img carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <!-- Placeholder for images -->
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#image-container" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#image-container" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div id="image_description" class="hide_img">
                                <div class="img_p"></div>
                                <div class="description">
                                    <div class="cart">
                                        <div>
                                            <div class="img">
                                                <img src="{{ asset('homePage/images/profile_img.jpg') }}">
                                            </div>
                                            <div class="info">
                                                <p class="name">Zineb_essoussi</p>
                                            </div>
                                        </div>
                                    </div>
                                    <form>
                                        <textarea class="postCaption" type="text " id="emoji_create" placeholder="Write a caption"></textarea>
                                    </form>
                                </div>
                            </div>
                            <div class="post_published hide_img">
                                <img src="{{ asset('homePage/images/uploaded_post.gif') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('homePage/sass/vender/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('homePage/sass/vender/bootstrap.bundle.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
            integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
            integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
        </script>
        <script src="{{ asset('homePage/owlcarousel/jquery.min.js') }}"></script>
        <script src="{{ asset('homePage/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('homePage/js/carousel.js') }}"></script>
        <script src="{{ asset('postModal/js/script.js') }}"></script>
        <script src="{{ asset('likes/js/likesShowModal.js') }}"></script>
        <script src="{{ asset('delete/js/delete.js') }}"></script>

</body>

</html>

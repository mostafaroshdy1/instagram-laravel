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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">

    {{-- from Roshdy: Uncomment this if you need bootstrap cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('homePage/sass/main.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body class="bg-black">
    {{-- @if (session('success'))
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
    @endif --}}


    <div id="successAlert" class="alert successAlert d-none">
    </div>
    <div id="warningAlert" class="alert warningAlert d-none">
    </div>



    <div class="post_page">
        @include('includes.navbar')

        <div class="second_container">
            <!--***** posts_container start ****** -->
            <div class="main_section">
                <div class="posts_container">
                    <div class="stories">
                        <div class="owl-carousel items">
                        </div>
                    </div>

                    <div class="posts" id="posts-container">
                        @include('posts.load')
                    </div>

                </div>
            </div>
            <!--***** posts_container end ****** -->

            <!--***** followers_container start ****** -->
            <div class="followers_container">
                <div>
                    <div class="suggestions">
                        @if ($unfollowedUsers->isNotEmpty())
                            <div class="title">
                                <h4>Suggestions for you</h4>
                            </div>
                        @endif
                        @foreach ($unfollowedUsers as $unfollowedUser)
                            <div class="cart">
                                <div>
                                    <div class="img">
                                        <img src="{{ $unfollowedUser->avatar }}" alt="">
                                    </div>
                                    <div class="info">
                                        <p class="name text-white">{{ $unfollowedUser->full_name }}</p>
                                        {{-- <p class="second_name">Zim Ess</p> --}}
                                    </div>
                                </div>
                                <div class="switch">
                                    <form method="POST" action="{{ route('follow', $unfollowedUser) }}">
                                        @csrf
                                        <button type="submit" class="btn">Follow</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!--***** followers_container end ****** -->

        </div>

        <!-- Modal for sending posts-->
        <div class="modal fade" id="send_message_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Share</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                            <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
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
        <!-- <div class="modal fade" id="create_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="background-color: #262626;">
                    <div class="modal-header" style="border-bottom-color: #363636">
                        <h1 class="modal-title w-100 fs-5 d-flex align-items-end justify-content-between"
                            id="exampleModalLabel">
                            <span class="title_create text-white">Create new post</span>
                            <button class="next_btn_post btn_link"></button>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <svg aria-label="Icon to represent media such as images or videos"
                            class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="77" role="img"
                            viewBox="0 0 97.6 77.3" width="96">
                            <title>Icon to represent media such as images or videos</title>
                            <path
                                d="M16.3 24h.3c2.8-.2 4.9-2.6 4.8-5.4-.2-2.8-2.6-4.9-5.4-4.8s-4.9 2.6-4.8 5.4c.1 2.7 2.4 4.8 5.1 4.8zm-2.4-7.2c.5-.6 1.3-1 2.1-1h.2c1.7 0 3.1 1.4 3.1 3.1 0 1.7-1.4 3.1-3.1 3.1-1.7 0-3.1-1.4-3.1-3.1 0-.8.3-1.5.8-2.1z"
                                fill="white"></path>
                            <path
                                d="M84.7 18.4 58 16.9l-.2-3c-.3-5.7-5.2-10.1-11-9.8L12.9 6c-5.7.3-10.1 5.3-9.8 11L5 51v.8c.7 5.2 5.1 9.1 10.3 9.1h.6l21.7-1.2v.6c-.3 5.7 4 10.7 9.8 11l34 2h.6c5.5 0 10.1-4.3 10.4-9.8l2-34c.4-5.8-4-10.7-9.7-11.1zM7.2 10.8C8.7 9.1 10.8 8.1 13 8l34-1.9c4.6-.3 8.6 3.3 8.9 7.9l.2 2.8-5.3-.3c-5.7-.3-10.7 4-11 9.8l-.6 9.5-9.5 10.7c-.2.3-.6.4-1 .5-.4 0-.7-.1-1-.4l-7.8-7c-1.4-1.3-3.5-1.1-4.8.3L7 49 5.2 17c-.2-2.3.6-4.5 2-6.2zm8.7 48c-4.3.2-8.1-2.8-8.8-7.1l9.4-10.5c.2-.3.6-.4 1-.5.4 0 .7.1 1 .4l7.8 7c.7.6 1.6.9 2.5.9.9 0 1.7-.5 2.3-1.1l7.8-8.8-1.1 18.6-21.9 1.1zm76.5-29.5-2 34c-.3 4.6-4.3 8.2-8.9 7.9l-34-2c-4.6-.3-8.2-4.3-7.9-8.9l2-34c.3-4.4 3.9-7.9 8.4-7.9h.5l34 2c4.7.3 8.2 4.3 7.9 8.9z"
                                fill="white"></path>
                            <path
                                d="M78.2 41.6 61.3 30.5c-2.1-1.4-4.9-.8-6.2 1.3-.4.7-.7 1.4-.7 2.2l-1.2 20.1c-.1 2.5 1.7 4.6 4.2 4.8h.3c.7 0 1.4-.2 2-.5l18-9c2.2-1.1 3.1-3.8 2-6-.4-.7-.9-1.3-1.5-1.8zm-1.4 6-18 9c-.4.2-.8.3-1.3.3-.4 0-.9-.2-1.2-.4-.7-.5-1.2-1.3-1.1-2.2l1.2-20.1c.1-.9.6-1.7 1.4-2.1.8-.4 1.7-.3 2.5.1L77 43.3c1.2.8 1.5 2.3.7 3.4-.2.4-.5.7-.9.9z"
                                fill="white"></path>
                        </svg>
                        <p class="text-white fs-5">Upload your image or video</p>
                        <button class="btn btn-primary btn_upload">
                            select from your computer
                            <form id="upload-form">
                                <input multiple class="input_select" type="file" id="image-upload"
                                    name="image-upload">
                            </form>
                        </button>
                        <div id="image-container" class="hide_img carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#image-container"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#image-container"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div id="image_description" class="hide_img">
                            <div class="img_p"></div>
                            <div class="description" style="background-color: #262626">
                                <div class="cart">
                                    <div>
                                        <div class="img">
                                            <img src="{{ asset('homePage/images/profile_img.jpg') }}">
                                        </div>
                                        <div class="info">
                                            <p class="name text-white">{{ auth()->user()->full_name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <form>
                                    <textarea class="postCaption" type="text" style="background-color:#262626 !important" id="emoji_create"
                                        placeholder="Write a caption"></textarea>
                                </form>
                            </div>
                        </div>
                        <div id="creatPostResponse" class="post_published hide_img">
                            <img src="{{ asset('homePage/images/loading.gif') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    </div>

    <script src="{{ asset('homePage/sass/vender/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('homePage/sass/vender/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('homePage/owlcarousel/jquery.min.js') }}"></script>
    <script src="{{ asset('homePage/owlcarousel/owl.carousel.min.js') }}"></script>
    {{-- <script src="{{ asset('homePage/js/carousel.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
    <script src="{{ asset('homePage/js/main.js') }}"></script>
    <script src="{{ asset('tags/js/script.js') }}"></script>
    <script src="{{ asset('likes/js/likes.js') }}"></script>
    <script src="{{ asset('delete/js/delete.js') }}"></script>

    <script>
        $(document).ready(function() {
            let nextPageUrl = '{{ $posts->nextPageUrl() }}';
            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                    if (nextPageUrl) {
                        loadMorePosts();
                    }
                }
            });

            function loadMorePosts() {
                $.ajax({
                    url: ensureHttps(nextPageUrl),
                    type: 'get',
                    beforeSend: function() {
                        nextPageUrl = '';
                    },
                    success: function(data) {
                        nextPageUrl = data.nextPageUrl;
                        $('#posts-container').append(data.view);
                        postLikes();
                        resetCommentEvents();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading more posts:", error);
                    }
                });
            }

            // Function to ensure the URL starts with HTTPS
            function ensureHttps(url) {
                if (url && url.startsWith('http://')) {
                    return url.replace('http://', 'https://');
                }
                return url;
            }

        });
    </script>
</body>

</html>

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
                    url: nextPageUrl,
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
        });
    </script>
</body>

</html>

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


    <div class="post_page ">
        @include('includes.navbar')

        <div class="second_container">
            <!--***** posts_container start ****** -->
            <div class="main_section">
                <div class="posts_container">
                    <div class="stories">
                        <div class="owl-carousel items">
                        </div>
                    </div>

                    <div class="posts">
                        @foreach ($posts as $post)
                            <div class="post">
                                <div class="info">
                                    <div class="person">
                                        <img src="${post_data[i][0]}">
                                        <a href="#" class="text-white">{{ $post->user->full_name }}</a>
                                        <span class="circle">.</span>
                                        <span>{{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="more">
                                        <img src="{{ asset('homePage/images/show_more.png') }}" alt="show more">
                                    </div>
                                </div>
                                @if ($post->images->isEmpty())
                                    @foreach ($post->videos as $video)
                                        <div class="video">
                                            <!-- Display video player here using the video URL -->
                                            <video controls>
                                                <source src="{{ $video->url }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    @endforeach
                                @else
                                    @foreach ($post->images as $img)
                                        <div class="image">
                                            <img src="{{ $img->url }}">
                                        </div>
                                    @endforeach
                                @endif

                                <div class="desc">
                                    <div class="icons">
                                        <div class="icon_left d-flex">
                                            <div class="like">
                                                <form id="likeForm" data-post-id="{{ $post->id }}"
                                                    style="display: inline;">
                                                    @csrf
                                                    {{-- Like button --}}
                                                    <button type="button" class="likeButton"
                                                        style="background: none; border: none; cursor: pointer;">
                                                        <svg class="not_loved" aria-label="Like"
                                                            fill="<?php echo $post->likes->contains('user_id', auth()->id()) ? 'red' : 'white'; ?>" height="24" role="img"
                                                            viewBox="0 0 24 24" width="24"
                                                            id="svg-{{ $post->id }}">
                                                            <title><?php echo $post->likes->contains('user_id', auth()->id()) ? 'Unlike' : 'Like'; ?></title>
                                                            <path
                                                                d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>


                                            <div class="chat">
                                                <button type="button" class="btn p-0 m-0" data-bs-toggle="modal"
                                                    data-bs-target="#message_modal_{{ $post->id }}">
                                                    <svg class="ms-3 m-0 p-0" style="color: white"
                                                        aria-label="Comment" class="x1lliihq x1n2onr6 x5n08af"
                                                        fill="currentColor" height="24" role="img"
                                                        viewBox="0 0 24 24" width="24">
                                                        <title>Comment</title>
                                                        <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z"
                                                            fill="none" stroke="currentColor"
                                                            stroke-linejoin="round" stroke-width="2"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="send">
                                                <button type="button" class="btn p-0" data-bs-toggle="modal"
                                                    data-bs-target="#send_message_modal">
                                                    <svg class="ms-3 m-0 p-0" style="color: white"
                                                        aria-label="Share Post" class="x1lliihq x1n2onr6 x1roi4f4"
                                                        fill="currentColor" height="24" role="img"
                                                        viewBox="0 0 24 24" width="24">
                                                        <title>Share Post</title>
                                                        <line fill="none" stroke="currentColor"
                                                            stroke-linejoin="round" stroke-width="2" x1="22"
                                                            x2="9.218" y1="3" y2="10.083"></line>
                                                        <polygon fill="none"
                                                            points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334"
                                                            stroke="currentColor" stroke-linejoin="round"
                                                            stroke-width="2"></polygon>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <form class="savePostForm" action="{{ route('posts.save-post') }}"
                                            method="post">
                                            @csrf
                                            <div class="save not_saved">
                                                <input id="hiddenInput" type="hidden" name="post_id"
                                                    value="{{ $post->id }}">
                                                <button id="saveBtn" type="button" class="savePostButton btn"
                                                    data-post-id="{{ $post->id }}">
                                                    <img src="{{ asset('homePage/images/bookmark.png') }}">
                                                </button>
                                            </div>
                                        </form>



                                    </div>
                                    <div class="liked">
                                        <a class="bold text-white" data-bs-toggle="modal"
                                            data-bs-target="#likersModal"
                                            id="likers-{{ $post->id }}">{{ $post->likes_count }} likes</a>
                                    </div>
                                    <div class="modal fade" id="likersModal" tabindex="-1"
                                        aria-labelledby="likersModalLabel" aria-hidden="true">
                                        <div
                                            class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                            <div class="modal-content bg-dark text-white">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="likersModalLabel">Likes</h1>
                                                    <i class="btn-close fa-2x fa-solid fa-xmark text-white"
                                                        data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"
                                                        id="likersClose"></i>
                                                </div>
                                                <div class="modal-body">
                                                    @foreach ($post->likers as $liker)
                                                        <div
                                                            class="d-flex flex-row justify-content-between align-items-center mb-4">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <img class="rounded-circle"
                                                                    src="{{ asset('homePage/images/profile_img.jpg') }}"
                                                                    width="55" />
                                                                <div class="d-flex flex-column align-items-start ml-2">
                                                                    <span class="font-weight-bold"
                                                                        style="font-size: 1.6em;">{{ $liker->full_name }}</span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="post_desc">
                                        <p>
                                        <p class="text-white" id = "post-body">{{ $post->body }}
                                        </p>
                                        </p>
                                        <div class="comments-section" data-post-id="{{ $post->id }}">
                                            {{-- posts comments --}}
                                            @foreach ($post->comments()->orderBy('created_at', 'desc')->take(3)->get() as $comment)
                                                <div class="comment d-flex justify-content-between align-items-center">
                                                    <p>
                                                        <strong
                                                            class="text-white">{{ $comment->user->full_name }}</strong>
                                                        <span class="text-white">{{ $comment->comment }}</span>
                                                    </p>
                                                    <div class="like d-flex align-items-center"
                                                        data-comment-id="{{ $comment->id }}">
                                                        @if ($comment->likes->contains(auth()->id()))
                                                            <button id="likeBtn"
                                                                class="btn btn-link like-button liked"
                                                                onclick="toggleLike({{ $comment->id }})">
                                                                <img class="not-loved"
                                                                    src="{{ asset('homePage/images/heart.png') }}"
                                                                    alt="heart image">
                                                            </button>
                                                        @else
                                                            <button id="likeBtn" class="btn btn-link like-button"
                                                                onclick="toggleLike({{ $comment->id }})">
                                                                <img class="loved"
                                                                    src="{{ asset('homePage/images/love.png') }}"
                                                                    alt="love image">
                                                            </button>
                                                        @endif
                                                        <span
                                                            class="text-white like-count">{{ $comment->likes()->count() }}
                                                            Likes</span>
                                                    </div>

                                                </div>
                                            @endforeach

                                            @if ($post->comments()->count() > 3)
                                                <div class="view-all-comments" data-bs-toggle="modal"
                                                    data-bs-target="#commentsModal-{{ $post->id }}"
                                                    data-post-id="{{ $post->id }}">
                                                    <a href="#" class="gray">View all
                                                        {{ $post->comments()->count() }} comments</a>
                                                </div>
                                            @endif

                                            {{-- comments modal view allllll --}}
                                            <div class="modal fade bg-black" id="commentsModal-{{ $post->id }}"
                                                tabindex="-1"
                                                aria-labelledby="commentsModalLabel-{{ $post->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content bg-dark">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-white"
                                                                id="commentsModalLabel-{{ $post->id }}">All
                                                                Comments</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="comments-list">
                                                                {{-- modal comments --}}
                                                                @foreach ($post->comments as $comment)
                                                                    <div
                                                                        class="comment text-white d-flex justify-content-between align-items-center">
                                                                        <p>
                                                                            <strong>{{ $comment->user->full_name }}</strong>
                                                                            <span>{{ $comment->comment }}</span>
                                                                        </p>
                                                                        <div class="like"
                                                                            data-comment-id="{{ $comment->id }}">
                                                                            @if ($comment->likes->contains(auth()->id()))
                                                                                <button id="likeBtn"
                                                                                    class="btn btn-link like-button liked"
                                                                                    onclick="toggleLike({{ $comment->id }})">
                                                                                    <img class="not-loved"
                                                                                        src="{{ asset('homePage/images/heart.png') }}"
                                                                                        alt="heart image">
                                                                                </button>
                                                                            @else
                                                                                <button id="likeBtn"
                                                                                    class="btn btn-link like-button"
                                                                                    onclick="toggleLike({{ $comment->id }})">
                                                                                    <img class="loved"
                                                                                        src="http://localhost:8000/homePage/images/love.png"
                                                                                        alt="love image">
                                                                                </button>
                                                                            @endif
                                                                            <span
                                                                                class=" like-count text-white">{{ $comment->likes()->count() }}
                                                                                Likes</span>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <form action="{{ route('comments.store') }}" method="POST"
                                            class="comment-form" data-post-id="{{ $post->id }}">
                                            @csrf
                                            <div class="comment">
                                                <input type="text" name="comment" class="comment-input"
                                                    placeholder="Add a comment...">
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button type="submit" class="btn submit-comment"
                                                    data-post-id="{{ $post->id }}">Post</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            {{-- add new comment modal --}}
                            <div class="modal fade" id="message_modal_{{ $post->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel_{{ $post->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel_{{ $post->id }}">
                                                Comments</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="comments">
                                                @foreach ($post->comments as $comment)
                                                    <div class="comment mb-3">
                                                        <div class="d-flex">
                                                            <div class="img">
                                                                <img src="{{ asset('homePage/images/profile_img.jpg') }}"
                                                                    alt="Profile Image">
                                                            </div>
                                                            <div class="content">
                                                                <div class="person">
                                                                    <h4>{{ $comment->user->full_name }}</h4>
                                                                    <span>{{ $comment->created_at->diffForHumans() }}</span>
                                                                </div>
                                                                <p class="lead">{{ $comment->comment }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="like" data-comment-id="{{ $comment->id }}">
                                                            @if ($comment->likes->contains(auth()->id()))
                                                                <button id="likeBtn"
                                                                    class="btn btn-link like-button liked"
                                                                    onclick="toggleLike({{ $comment->id }})">
                                                                    {{-- <img class="not-loved"
                                                                        src="{{ asset('homePage/images/heart.png') }}"
                                                                        alt="heart image"> --}}
                                                                </button>
                                                            @else
                                                                <button id="likeBtn"
                                                                    class="btn btn-link like-button"
                                                                    onclick="toggleLike({{ $comment->id }})">
                                                                    {{-- <img class="loved"
                                                                        src="{{ asset('homePage/images/love.png') }}"
                                                                        alt="love image"> --}}
                                                                </button>
                                                            @endif
                                                            <span class="like-count">
                                                                {{-- {{ $comment->likes()->count() }} Likes --}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="modal-footer">

                                            <form action="{{ route('comments.store') }}" method="POST"
                                                class="comment-form" data-post-id="{{ $post->id }}">
                                                @csrf
                                                <div class="input-group">
                                                    <img src="{{ asset('homePage/images/profile_img.jpg') }}"
                                                        class="img-fluid" alt="Profile Image">
                                                    <input type="text" name="comment"
                                                        class="comment-input form-control"
                                                        placeholder="Add a comment...">
                                                    <input type="hidden" name="post_id"
                                                        value="{{ $post->id }}">
                                                    <button type="submit" class="btn submit-comment"
                                                        data-post-id="{{ $post->id }}">Post</button>
                                                </div>
                                            </form>
                                            {{-- <form action="{{ route('comments.store') }}" method="post">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="text" id="emoji_comment" name="comment"
                                                        class="form-control" placeholder="Add a comment...">
                                                    <input type="hidden" name="post_id"
                                                        value="{{ $post->id }}">
                                                    <button type="submit" class="btn">Add</button>
                                                </div>
                                            </form> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <!--***** posts_container end ****** -->

            <!--***** followers_container start ****** -->
            <div class="followers_container">
                <div>
                    <div class="cart">
                        <div>
                            <div class="img">
                                <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                            </div>
                            <div class="info">
                                <p class="name">Zineb_essoussi</p>
                                <p class="second_name">Zim Ess</p>
                            </div>
                        </div>
                        <div class="switch">
                            <a href="#">Switch</a>
                        </div>
                    </div>
                    <div class="suggestions">
                        <div class="title">
                            <h4>Suggestions for you</h4>
                            <a class="dark" href="#">See All</a>
                        </div>
                        <div class="cart">
                            <div>
                                <div class="img">
                                    <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                                </div>
                                <div class="info">
                                    <p class="name">Zineb_essoussi</p>
                                    <p class="second_name">Zim Ess</p>
                                </div>
                            </div>
                            <div class="switch">
                                <button class="follow_text" href="#">follow</button>
                            </div>
                        </div>
                        <div class="cart">
                            <div>
                                <div class="img">
                                    <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                                </div>
                                <div class="info">
                                    <p class="name">Zineb_essoussi</p>
                                    <p class="second_name">Zim Ess</p>
                                </div>
                            </div>
                            <div class="switch">
                                <button class="follow_text" href="#">follow</button>
                            </div>
                        </div>
                        <div class="cart">
                            <div>
                                <div class="img">
                                    <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                                </div>
                                <div class="info">
                                    <p class="name">Zineb_essoussi</p>
                                    <p class="second_name">Zim Ess</p>
                                </div>
                            </div>
                            <div class="switch">
                                <button class="follow_text" href="#">follow</button>
                            </div>
                        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
    <script src="{{ asset('homePage/js/main.js') }}"></script>
    <script src="{{ asset('tags/js/script.js') }}"></script>

</body>

</html>

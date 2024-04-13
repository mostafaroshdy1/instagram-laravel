@extends('layout.insta')
@section('content')
    <div class="profile_container mt-0 d-flex">
        <div class="profile_info">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="mb-4 header-text">Posts from #{{ $hashtag }}</h1>
                    <h5 class="header-text">Total Posts: {{ $posts->count() }}</h5>
                    <hr class="post-separator">
                </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div id="posts_sec" class="post d-grid gap-3" style="grid-template-columns: repeat(3, 1fr);">
                        @foreach ($posts as $post)
                            <div class="item bg-white mt-1">
                                @if ($post->images->isEmpty())
                                    <div class="video-container" style="width: 100%; height: 100%; overflow: hidden;">
                                        <video id="{{ $post->id }}" class="posts-video"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                            <source src="{{ $post->videos->first()->url }}" type="video/mp4"
                                                autoplay="false">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @else
                                    <div style="width: 100%; height: 100%; overflow: hidden;">
                                        @if ($post->images->count() > 1)
                                            <div class="multiple-images-icon position-absolute top-3 start-3">
                                                <svg width="30" height="24">
                                                    <rect x="5" y="5" width="15" height="2" fill="white" />
                                                    <rect x="5" y="10" width="15" height="2" fill="white" />
                                                    <rect x="5" y="15" width="15" height="2" fill="white" />
                                                </svg>
                                            </div>
                                        @endif
                                        <img id="{{ $post->id }}" class="img-fluid item_img posts-img test"
                                            src="{{ $post->images->first()->url }}" alt=""
                                            data-image-url="{{ $post->images->first()->url }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                @endif
                                @include('layouts.postModal', ['post' => $post])
                                @include('layouts.likes', ['post' => $post])
                                @include('layouts.commentsIcon', ['post' => $post])
                                <div class="modal fade" id="postMenuModal-{{ $post->id }}-2" tabindex="-1"
                                    aria-labelledby="postsMenuModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                                        <div class="modal-content bg-dark text-white">
                                            <div class="modal-header d-flex justify-content-center">
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="modal-title fs-2 deletePostBtn"
                                                        style="color: red;">Delete</button>
                                                </form>

                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <h1 class="modal-title fs-2 myHov" id="menuModalLabel22"
                                                    data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                                                    Cancel
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for sending posts-->
    <div class="modal fade" id="send_message_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <div class="modal fade" id="create_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title w-100 fs-5 d-flex align-items-end justify-content-between"
                        id="exampleModalLabel">
                        <span class="title_create">Create new post</span>
                        <button class="next_btn_post btn_link"></button>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img class="up_load" src="{{ asset('/homePage/images/upload.png') }}" alt="upload">
                    <p>Drag photos and videos here</p>
                    <button class="btn btn-primary btn_upload">
                        select from your computer
                        <form id="upload-form">
                            <input multiple class="input_select" type="file" id="image-upload" name="image-upload">
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
@endsection

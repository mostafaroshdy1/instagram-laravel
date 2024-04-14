@foreach ($posts as $post)
    <div class="post">
        <div class="info">
            <div class="person">
                <img src="{{ $post->user->avatar }}">
                <a href="{{ route('user.profile.show', $post->user) }}"
                    class="text-white">{{ $post->user->full_name }}</a>
                <span class="circle">.</span>
                <span>{{ $post->created_at->diffForHumans() }}</span>
            </div>

            @if (auth()->id() == $post->user_id)
                @include('layouts.deleteMenu', ['post' => $post])
            @endif


        </div>
        @if ($post->images->isEmpty())
            @foreach ($post->videos as $video)
                <div class="video-container">
                    <video controls class="w-100">
                        <source src="{{ $video->url }}" type="video/mp4" autoplay="false">
                        Your browser does not support the video tag.
                    </video>
                </div>
            @endforeach
        @else
            <div id="postHome-carousel-{{ $post->id }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($post->images as $index => $image)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ $image->url }}" class="d-block w-100" alt="post image">
                        </div>
                    @endforeach
                </div>
                @if (count($post->images) > 1)
                    <button class="carousel-control-prev" type="button"
                        data-bs-target="#postHome-carousel-{{ $post->id }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button"
                        data-bs-target="#postHome-carousel-{{ $post->id }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                @endif
            </div>
        @endif

        <div class="desc">
            <div class="icons">
                <div class="icon_left d-flex">

                    @include('layouts.likesBtn', ['post' => $post])


                    <div class="chat">
                        @include('layouts.commentsIcon')

                    </div>
                    <div class="send">
                        <button type="button" class="btn p-0" data-bs-toggle="modal"
                            data-bs-target="#send_message_modal">
                            <svg class="ms-3 m-0 p-0" style="color: white" aria-label="Share Post"
                                class="x1lliihq x1n2onr6 x1roi4f4" fill="currentColor" height="24" role="img"
                                viewBox="0 0 24 24" width="24">
                                <title>Share Post</title>
                                <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    x1="22" x2="9.218" y1="3" y2="10.083"></line>
                                <polygon fill="none"
                                    points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334"
                                    stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon>
                            </svg>
                        </button>
                    </div>
                </div>
                <form class="savePostForm" action="{{ route('posts.save-post') }}" method="post">
                    @csrf
                    <div class="save not_saved">
                        <input id="hiddenInput" type="hidden" name="post_id" value="{{ $post->id }}">
                        <button id="saveBtn" type="button" class="savePostButton btn"
                            data-post-id="{{ $post->id }}">
                            <img src="{{ asset('homePage/images/bookmark.png') }}">
                        </button>
                    </div>
                </form>
            </div>

            <div class="liked">
                <a class="bold text-white" data-bs-toggle="modal" data-bs-target="#likersModal"
                    onclick="drawLikersModal({{ $post->likers }})"
                    id="likers-{{ $post->id }}">{{ $post->likes_count }} likes</a>

            </div>
            @include('layouts.likes', ['post' => $post])

            <div class="post_desc">
                <p class="text-white" id = "post-body">{{ $post->body }}
                </p>
                <div class="comments-section" data-post-id="{{ $post->id }}">
                    {{-- posts comments --}}
                    @foreach ($post->comments->reverse()->take(3) as $comment)
                        <div class="comment d-flex justify-content-between align-items-center"
                            data-comment-id="{{ $comment->id }}">

                            <p>
                                <strong class="text-white">{{ $comment->user->full_name }}</strong>
                                <span class="text-white">{{ $comment->comment }}</span>
                            </p>

                            <div class="like d-flex align-items-center" data-comment-id="{{ $comment->id }}">
                                @if ($comment->likes->contains('user_id', auth()->id()))
                                    <button id="likeBtn" class="btn btn-link like-button liked"
                                        onclick="toggleLike({{ $comment->id }})">
                                        <img class="not-loved" src="{{ asset('homePage/images/heart.png') }}"
                                            alt="heart image">
                                    </button>
                                @else
                                    <button id="likeBtn" class="btn btn-link like-button"
                                        onclick="toggleLike({{ $comment->id }})">
                                        <img class="loved" src="{{ asset('homePage/images/love.png') }}"
                                            alt="love image">
                                    </button>
                                @endif
                                <span class="text-white like-count">{{ $comment->likes->count() }}
                                    Likes</span>
                                @if (auth()->user()->id === $comment->user_id)
                                    <a class="btn text-white fw-bold delete-comment"
                                        onclick="deleteComment({{ $comment->id }})">X</a>
                                @endif
                            </div>

                        </div>
                    @endforeach

                    @if ($post->comments_count > 3)
                        <div class="view-all-comments" data-bs-toggle="modal"
                            data-bs-target="#commentsModal-{{ $post->id }}" data-post-id="{{ $post->id }}">
                            <a href="#" class="gray">View all
                                {{ $post->comments_count }} comments</a>
                        </div>
                    @endif

                    {{-- comments modal view allllll --}}
                    <div class="modal fade bg-black" id="commentsModal-{{ $post->id }}" tabindex="-1"
                        aria-labelledby="commentsModalLabel-{{ $post->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content bg-dark">
                                <div class="modal-header">
                                    <h5 class="modal-title text-white" id="commentsModalLabel-{{ $post->id }}">
                                        All
                                        Comments</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="comments-list">
                                        {{-- modal comments --}}
                                        @foreach ($post->comments as $comment)
                                            <div class="comment text-white d-flex justify-content-between align-items-center"
                                                data-comment-id="{{ $comment->id }}">
                                                <p>
                                                    <strong>{{ $comment->user->full_name }}</strong>
                                                    <span>{{ $comment->comment }}</span>
                                                </p>
                                                <div class="like" data-comment-id="{{ $comment->id }}">
                                                    @if ($comment->likes->contains('user_id', auth()->id()))
                                                        <button id="likeBtn" class="btn btn-link like-button liked"
                                                            onclick="toggleLike({{ $comment->id }})">
                                                            <img class="not-loved"
                                                                src="{{ asset('homePage/images/heart.png') }}"
                                                                alt="heart image">
                                                        </button>
                                                    @else
                                                        <button id="likeBtn" class="btn btn-link like-button"
                                                            onclick="toggleLike({{ $comment->id }})">
                                                            <img class="loved"
                                                                src="http://localhost:8000/homePage/images/love.png"
                                                                alt="love image">
                                                        </button>
                                                    @endif
                                                    <span
                                                        class=" like-count text-white">{{ $comment->likes()->count() }}
                                                        Likes</span>
                                                    @if (auth()->user()->id === $comment->user_id)
                                                        <a class="btn text-white fw-bold delete-comment"
                                                            onclick="deleteComment({{ $comment->id }})">X</a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <form action="{{ route('comments.store') }}" method="POST" class="comment-form"
                    data-post-id="{{ $post->id }}">
                    @csrf
                    <div class="comment">
                        <input type="text" name="comment" class="comment-input" placeholder="Add a comment..."
                            style="width:90%">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="btn submit-comment" data-post-id="{{ $post->id }}">
                            <img src="{{ asset('homePage/images/send.png') }}" alt="send" />
                        </button>
                    </div>
                </form>
            </div>
            <hr style="color:white">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    @if ($comment->likes->contains('user_id', auth()->id()))
                                        <button id="likeBtn" class="btn btn-link like-button liked"
                                            onclick="toggleLike({{ $comment->id }})">
                                            {{-- <img class="not-loved"
                                            src="{{ asset('homePage/images/heart.png') }}"
                                            alt="heart image"> --}}
                                        </button>
                                    @else
                                        <button id="likeBtn" class="btn btn-link like-button"
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

                    <form action="{{ route('comments.store') }}" method="POST" class="comment-form"
                        data-post-id="{{ $post->id }}">
                        @csrf
                        <div class="input-group">
                            <img src="{{ asset('homePage/images/profile_img.jpg') }}" class="img-fluid"
                                alt="Profile Image">
                            <input type="text" name="comment" class="comment-input form-control"
                                placeholder="Add a comment...">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
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
<div class="d-none">
    {{ $posts->links() }}
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

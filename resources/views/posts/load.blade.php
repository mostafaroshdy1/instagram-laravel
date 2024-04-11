@foreach ($posts as $post)
    <div class="post">
        <div class="info">
            <div class="person">
                <img src="{{$post->user->avatar}}">
                <a href="#" class="text-white">{{ $post->user->full_name }}</a>
                <span class="circle">.</span>
                <span>{{ $post->created_at->diffForHumans() }}</span>
            </div>

        @if (auth()->id() == $post->user_id)
            <div class="more delmenu" data-bs-toggle="modal" id="{{ $post->id }}" data-post-id="{{$post->id}}" >
            <svg fill="#ffffff" height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 297 297" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M42.352,106.148C18.999,106.148,0,125.147,0,148.5c0,23.353,18.999,42.352,42.352,42.352 c23.353,0,42.352-18.999,42.352-42.352C84.704,125.147,65.705,106.148,42.352,106.148z"></path> <path d="M148.5,106.148c-23.353,0-42.352,18.999-42.352,42.352c0,23.353,18.999,42.352,42.352,42.352 s42.352-18.999,42.352-42.352C190.852,125.147,171.853,106.148,148.5,106.148z"></path> <path d="M254.648,106.148c-23.353,0-42.352,18.999-42.352,42.352c0,23.353,18.999,42.352,42.352,42.352S297,171.853,297,148.5 C297,125.147,278.001,106.148,254.648,106.148z"></path> </g> </g> </g> </g></svg>
            </div>
            @include('layouts.deleteMenu', ['post' => $post])
        @endif


        </div>
        @if ($post->images->isEmpty())
            @foreach ($post->videos as $video)
                <div class="video-container">
                    <video controls class="w-100">
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
                <a class="bold text-white" data-bs-toggle="modal" data-bs-target="#likersModal" onclick="drawLikersModal({{ $post->likers }})"
                    id="likers-{{ $post->id }}">{{ $post->likes_count }} likes</a>
            </div>
            @include('layouts.likes', ['post' => $post])




            <div class="post_desc">
                <p>
                <p class="text-white" id = "post-body">{{ $post->body }}
                </p>
                </p>
                <div class="comments-section" data-post-id="{{ $post->id }}">
                    {{-- posts comments --}}
                    @foreach ($post->comments->reverse()->take(3) as $comment)
                        <div class="comment d-flex justify-content-between align-items-center" data-comment-id="{{ $comment->id }}">

                            <p>
                                <strong class="text-white">{{ $comment->user->full_name }}</strong>
                                <span class="text-white">{{ $comment->comment }}</span>
                            </p>
                            
                            <div class="like d-flex align-items-center" data-comment-id="{{ $comment->id }}">
                                @if ($comment->likes->contains(auth()->id()))
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
                            @if(auth()->user()->id === $comment->user_id)
                                <a class="btn text-white fw-bold delete-comment" onclick="deleteComment({{ $comment->id }})">X</a>
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
                                            <div
                                                class="comment text-white d-flex justify-content-between align-items-center" data-comment-id="{{ $comment->id }}">
                                                <p>
                                                    <strong>{{ $comment->user->full_name }}</strong>
                                                    <span>{{ $comment->comment }}</span>
                                                </p>
                                                <div class="like" data-comment-id="{{ $comment->id }}">
                                                    @if ($comment->likes->contains(auth()->id()))
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
                                                        @if(auth()->user()->id === $comment->user_id)
                                                            <a class="btn text-white fw-bold delete-comment" onclick="deleteComment({{ $comment->id }})">X</a>
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
                        <input type="text" name="comment" class="comment-input" placeholder="Add a comment...">
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
                                    @if ($comment->likes->contains(auth()->id()))
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

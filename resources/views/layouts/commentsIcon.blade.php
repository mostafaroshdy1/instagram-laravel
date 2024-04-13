<button type="button" class="btn p-0 m-0" data-bs-toggle="modal" data-bs-target="#message_modal_{{ $post->id }}">
    <svg class="ms-3 m-0 p-0" style="color: white" aria-label="Comment" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor"
        height="24" role="img" viewBox="0 0 24 24" width="24">
        <title>Comment</title>
        <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none" stroke="currentColor"
            stroke-linejoin="round" stroke-width="2"></path>
    </svg>
</button>


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
                        <div class="comment mb-3 data-comment" id="{{ $comment->id }}">
                            <div class="d-flex">
                                <div class="img">
                                    <img src="{{ Auth::user()->avatar }}" alt="User Avatar"
                                        class="img-fluid image_width">
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
                                @if (auth()->user()->id === $comment->user_id)
                                    <a class="btn text-white fw-bold delete-comment"
                                        onclick="deleteComment({{ $comment->id }})">X</a>
                                @endif
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
                        <img src="{{ Auth::user()->avatar }}" alt="User Avatar"
                            class="img-fluid image_width h-100 reset-image-style">
                        <input type="text" name="comment" class="comment-input form-control"
                            style="background-color:white" placeholder="Add a comment...">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="btn submit-comment" data-post-id="{{ $post->id }}">
                            <img src="{{ asset('homePage/images/send2.png') }}" alt="send" />
                        </button>
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

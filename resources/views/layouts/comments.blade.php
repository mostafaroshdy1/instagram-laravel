<div class="comments-section scrollable-comments" data-post-id="{{ $post->id }}" data-bs-spy="scroll"
    data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
    class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
    {{-- posts comments --}}
    @foreach ($post->comments()->orderBy('created_at', 'desc')->get() as $comment)
        <div class="comment d-flex justify-content-between align-items-center " data-comment-id="{{ $comment->id }}">
            <p>
                <strong class="text-white">{{ $comment->user->full_name }}</strong>
                <span class="text-white">{{ $comment->comment }}</span>
            </p>
            <div class="like d-flex align-items-center" data-comment-id="{{ $comment->id }}">
                @if ($comment->likes->contains(auth()->id()))
                    <button id="likeBtn" class="btn btn-link like-button liked"
                        onclick="toggleLike({{ $comment->id }})">
                        <img class="not-loved" src="{{ asset('homePage/images/heart.png') }}" alt="heart image">
                    </button>
                @else
                    <button id="likeBtn" class="btn btn-link like-button" onclick="toggleLike({{ $comment->id }})">
                        <img class="loved" src="{{ asset('homePage/images/love.png') }}" alt="love image">
                    </button>
                @endif
                <span class="text-white like-count">{{ $comment->likes()->count() }}
                    Likes</span>
                @if (auth()->user()->id === $comment->user_id)
                    <a class="btn text-white fw-bold delete-comment" onclick="deleteComment({{ $comment->id }})">X</a>
                @endif
            </div>

        </div>
    @endforeach

</div>
<form action="{{ route('comments.store') }}" method="POST" class="comment-form" data-post-id="{{ $post->id }}">
    @csrf
    <div class="comment">
        <input type="text" name="comment" class="" placeholder="Add a comment..." style="width:90%">
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <button type="submit" class="btn submit-comment" data-post-id="{{ $post->id }}">
            <img src="{{ asset('homePage/images/send.png') }}" alt="send" />
        </button>
    </div>
</form>

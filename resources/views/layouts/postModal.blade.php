<div class="modal fade" id="postModal-{{ $post->id }}" tabindex="-1" aria-labelledby="postModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content bg-dark text-white">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12 post-image-column d-flex align-items-center">
                        <img src={{ $post->images[0]['url'] }} class="img-fluid img-cover" alt="post image">
                    </div>

                    <div class="col-lg-6 col-md-12 p-2">
                        <div class="fixed-top-section d-flex align-items-center mb-3">
                            <img src={{ $post->images[0]['url'] }} class="img-fluid rounded-circle me-2 avatar"
                                alt="user avatar">
                            <h5 class="mb-0">{{ $post->user->full_name }} </h5>
                        </div>

                        <div class="mb-3">
                            <p>{{ $post->body }}</p>
                        </div>

                        <div class="scrollable-section mb-3">
                            <h5>Comments:</h5>
                            <div class="comment-item d-flex align-items-center mb-2">
                                <img src="commenter_avatar_url" class="img-fluid rounded-circle me-2"
                                    alt="commenter avatar" style="width: 30px; height: 30px;">
                                <p class="mb-0">Comment text goes here</p>
                            </div>
                        </div>

                        <div class="fixed-bottom-section">
                            <div class="icons d-flex align-items-center">
                                @include('layouts.likesBtn', ['post' => $post])

                                <div class="chat me-1">
                                    <button type="button" class="btn p-0 m-0" data-bs-toggle="modal"
                                        data-bs-target="#message_modal_{{ $post->id }}">
                                        <svg class="ms-3 m-0 p-0" style="color: white" aria-label="Comment"
                                            class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24"
                                            role="img" viewBox="0 0 24 24" width="24">
                                            <title>Comment</title>
                                            <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none"
                                                stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path>
                                        </svg>
                                    </button>
                                </div>

                                <div class="send me-1">
                                    <button type="button" class="btn p-0" data-bs-toggle="modal"
                                        data-bs-target="#send_message_modal">
                                        <svg class="ms-3 m-0 p-0" style="color: white" aria-label="Share Post"
                                            class="x1lliihq x1n2onr6 x1roi4f4" fill="currentColor" height="24"
                                            role="img" viewBox="0 0 24 24" width="24">
                                            <title>Share Post</title>
                                            <line fill="none" stroke="currentColor" stroke-linejoin="round"
                                                stroke-width="2" x1="22" x2="9.218" y1="3"
                                                y2="10.083"></line>
                                            <polygon fill="none"
                                                points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334"
                                                stroke="currentColor" stroke-linejoin="round" stroke-width="2">
                                            </polygon>
                                        </svg>
                                    </button>
                                </div>

                                <div class="save">
                                    <form class="savePostForm" action="{{ route('posts.save-post') }}" method="post">
                                        @csrf
                                        <input id="hiddenInput" type="hidden" name="post_id" value="">
                                        <button id="saveBtn" type="button" class="savePostButton btn">
                                            <img src="{{ asset('homePage/images/bookmark.png') }}">
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="liked">
                                <a class="bold text-white" data-bs-toggle="modal"  onclick="drawLikersModal({{ $post->likers }}, {{ $post->id }})" 
                                    id="likers-{{ $post->id }}">{{ $post->likes_count }} likes</a>
                            </div>
                            
                            <div class="add-comment mt-3">
                                <form action="{{ route('comments.store') }}" method="POST" class="comment-form"
                                    data-post-id="{{ $post->id }}">
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
                </div>

            </div>
        </div>
    </div>
</div>

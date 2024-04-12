<div id="successAlert" class="alert successAlert d-none">
</div>
<div id="warningAlert" class="alert warningAlert d-none">
</div>

<div class="modal fade" id="savedPostModal-{{ $post->id }}" tabindex="-1" aria-labelledby="postModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content bg-dark text-white">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12 post-image-column d-flex align-items-center">
                        <div id="savedPostModal-carousel-{{ $post->id }}" class="carousel slide"
                            data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @if ($post->images->isEmpty())
                                    <div class="video-container">
                                        <video controls class="w-100 h-100">
                                            <source class="posts-video" id="{{ $post->id }}"
                                                src="{{ $post->videos->first()->url }}" type="video/mp4">
                                        </video>
                                    </div>
                                @else
                                    @foreach ($post['images'] as $index => $image)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ $image['url'] }}" class="img-fluid img-cover" alt="post image">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            @if (count($post['images']) > 1)
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#savedPostModal-carousel-{{ $post->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#savedPostModal-carousel-{{ $post->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 p-2">
                        <div class="fixed-top-section d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ $post->user->avatar }}" class="img-fluid rounded-circle me-2 avatar"
                                    alt="user avatar">
                                <h5 class="mb-0">{{ $post->user->full_name }}</h5>
                            </div>

                            @if (auth()->id() == $post->user_id)
                                <div class="more delmenu" data-bs-toggle="modal" id="{{ $post->id }}"
                                    data-post-id="{{ $post->id }}">
                                    <svg fill="#ffffff" height="20px" width="20px" version="1.1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 0 297 297" xml:space="preserve">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M42.352,106.148C18.999,106.148,0,125.147,0,148.5c0,23.353,18.999,42.352,42.352,42.352 c23.353,0,42.352-18.999,42.352-42.352C84.704,125.147,65.705,106.148,42.352,106.148z">
                                                        </path>
                                                        <path
                                                            d="M148.5,106.148c-23.353,0-42.352,18.999-42.352,42.352c0,23.353,18.999,42.352,42.352,42.352 s42.352-18.999,42.352-42.352C190.852,125.147,171.853,106.148,148.5,106.148z">
                                                        </path>
                                                        <path
                                                            d="M254.648,106.148c-23.353,0-42.352,18.999-42.352,42.352c0,23.353,18.999,42.352,42.352,42.352S297,171.853,297,148.5 C297,125.147,278.001,106.148,254.648,106.148z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <p id="post-body">{{ $post->body }}</p>
                        </div>

                        {{-- <div class="scrollable-section mb-3">
                            <h5>Comments:</h5>
                            <div class="comment-item d-flex align-items-center mb-2">
                                <img src="commenter_avatar_url" class="img-fluid rounded-circle me-2"
                                    alt="commenter avatar" style="width: 30px; height: 30px;">
                                <p class="mb-0">Comment text goes here</p>
                            </div>

                        </div> --}}

                        <div class="fixed-bottom-section">
                            <div class="icons d-flex align-items-center">
                                <div class="like">
                                    <form id="likeForm2" data-post-id="{{ $post->id }}" style="display: inline;">
                                        @csrf
                                        {{-- Like button --}}
                                        <button type="button" class="likeButtonSaved"
                                            style="background: none; border: none; cursor: pointer;">
                                            <svg class="not_loved" aria-label="Like" fill="<?php echo $post->likes->contains('user_id', auth()->id()) ? 'red' : 'white'; ?>"
                                                height="24" role="img" viewBox="0 0 24 24" width="24"
                                                id="svg-{{ $post->id }}-2">
                                                <title><?php echo $post->likes->contains('user_id', auth()->id()) ? 'Unlike' : 'Like'; ?></title>
                                                <path
                                                    d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>

                                <div class="chat me-1">
                                    <button type="button" class="btn p-0 m-0" data-bs-toggle="modal"
                                        data-bs-target="#message_modal_{{ $post->id }}">
                                        <svg class="ms-3 m-0 p-0" style="color: white" aria-label="Comment"
                                            class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24"
                                            role="img" viewBox="0 0 24 24" width="24">
                                            <title>Comment</title>
                                            <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none"
                                                stroke="currentColor" stroke-linejoin="round" stroke-width="2">
                                            </path>
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
                            </div>
                            <div class="liked">
                                <a class="bold text-white" data-bs-toggle="modal"
                                    onclick="drawLikersModal2({{ $post->likers }}, {{ $post->id }})"
                                    id="likers-{{ $post->id }}-2">{{ $post->likes_count }} likes</a>
                            </div>

                            <div class="add-comment mt-3">
                                @include('layouts.comments')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

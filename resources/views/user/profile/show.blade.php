@extends('layout.insta')
@section('content')
    {{-- <h1>User Profile</h1>
<p>{{ $user->full_name }}</p>

<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#followersModal" id="followers">
        Followers
</button>
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#followingsModal" id="followings">
        Followings
</button>

@if (auth()->user()->isNot($user))
    @if (auth()->user()->followings && auth()->user()->followings->contains($user))
        <form method="POST" action="{{ route('unfollow', $user) }}">
            @csrf
            <button type="submit">Unfollow</button>
        </form>
    @elseif ($user->followings && $user->followings->contains(auth()->user()))
        <form method="POST" action="{{ route('follow', $user) }}">
            @csrf
            <button type="submit">Follow Back</button>
        </form>
    @else
        <form method="POST" action="{{ route('follow', $user) }}">
            @csrf
            <button type="submit">Follow</button>
        </form>
    @endif
<p>Number of followers: {{$user->followers()->count()}}</p>
<p>Number of followings: {{$user->followings()->count()}}</p>
@endif
{{--  --}}


    <div id="successAlert" class="alert successAlert d-none">
    </div>
    <div id="warningAlert" class="alert warningAlert d-none">
    </div>


    <div class="profile_container">
        <div class="profile_info">
            <div class="cart">
                <div class="img">
                    <img src="{{ $user->avatar ?? asset('homePage/images/profile_img.jpg') }}" alt=""
                        class="img-fluid rounded-circle me-2 profile-avatar">
                </div>
                <div class="info">
                    <p class="name">
                        {{ $user->username }}
                        @if ($user->isVerified)
                            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="none" viewBox="0 0 24 24" id="verified">
                                <g clip-path="url(#clip0_1084_3803)">
                                    <path fill="#4DC4FF"
                                        d="M13.3546 1.46995C12.6544 0.614752 11.3466 0.614755 10.6465 1.46995L9.65463 2.6814C9.58665 2.76443 9.47325 2.79482 9.37286 2.7569L7.90817 2.20367C6.87422 1.81314 5.74163 2.46703 5.56286 3.55774L5.30963 5.10281C5.29227 5.20871 5.20926 5.29172 5.10335 5.30908L3.55829 5.56231C2.46759 5.74108 1.81368 6.87366 2.20422 7.90762L2.75745 9.37231C2.79537 9.4727 2.76498 9.5861 2.68195 9.65408L1.4705 10.6459C0.615302 11.3461 0.615304 12.6539 1.4705 13.3541L2.68195 14.3459C2.76498 14.4139 2.79537 14.5273 2.75745 14.6277L2.20422 16.0924C1.81369 17.1263 2.46758 18.2589 3.55829 18.4377L5.10335 18.6909C5.20926 18.7083 5.29227 18.7913 5.30963 18.8972L5.56286 20.4422C5.74163 21.5329 6.87421 22.1868 7.90817 21.7963L9.37286 21.2431C9.47325 21.2052 9.58665 21.2355 9.65463 21.3186L10.6465 22.53C11.3466 23.3852 12.6544 23.3852 13.3546 22.53L14.3464 21.3186C14.4144 21.2355 14.5278 21.2052 14.6282 21.2431L16.0929 21.7963C17.1269 22.1868 18.2595 21.5329 18.4382 20.4422L18.6915 18.8972C18.7088 18.7913 18.7918 18.7083 18.8977 18.6909L20.4428 18.4377C21.5335 18.2589 22.1874 17.1263 21.7969 16.0924L21.2436 14.6277C21.2057 14.5273 21.2361 14.4139 21.3191 14.3459L22.5306 13.3541C23.3858 12.6539 23.3858 11.3461 22.5306 10.6459L21.3191 9.65408C21.2361 9.5861 21.2057 9.4727 21.2436 9.37231L21.7969 7.90762C22.1874 6.87366 21.5335 5.74108 20.4428 5.56231L18.8977 5.30908C18.7918 5.29172 18.7088 5.20871 18.6915 5.10281L18.4382 3.55774C18.2595 2.46704 17.1269 1.81313 16.0929 2.20367L14.6282 2.7569C14.5278 2.79482 14.4144 2.76443 14.3464 2.6814L13.3546 1.46995Z">
                                    </path>
                                    <path fill="#ECEFF1" fill-rule="evenodd"
                                        d="M18.0303 7.96967C18.3232 8.26256 18.3232 8.73744 18.0303 9.03033L11.0303 16.0303C10.8897 16.171 10.6989 16.25 10.5 16.25C10.3011 16.25 10.1103 16.171 9.96967 16.0303L5.96967 12.0303C5.67678 11.7374 5.67678 11.2626 5.96967 10.9697C6.26256 10.6768 6.73744 10.6768 7.03033 10.9697L10.5 14.4393L16.9697 7.96967C17.2626 7.67678 17.7374 7.67678 18.0303 7.96967Z"
                                        clip-rule="evenodd"></path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_1084_3803">
                                        <rect width="24" height="24" fill="#fff"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                        @endif
                        @if (auth()->id() == $user->id)
                            <a href="{{ route('user.profile.edit', $user) }}">
                                <button class="edit_profile">
                                    Edit profile
                                </button>
                            </a>
                        @endif
                    </p>
                    <div class="general_info">
                        <p><span>{{ $user->posts()->count() }}</span> posts</p>
                        <p data-bs-toggle="modal" data-bs-target="#followersModal" id="followers">
                            <span>{{ $user->followers()->count() }}</span>
                            followers
                        </p>
                        <p data-bs-toggle="modal" data-bs-target="#followingsModal" id="followings">
                            <span>{{ $user->followings()->count() }}</span>
                            following
                        </p>
                        @php
                            $isDisabled = false;
                            $isDisabledUnblock = false;
                        @endphp
                        @if (auth()->user()->isNot($user))
                            @if (auth()->user()->followings && auth()->user()->followings->contains($user))
                                <form method="POST" action="{{ route('unfollow', $user) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-light ">Unfollow</button>
                                </form>
                            @elseif ($user->followings && $user->followings->contains(auth()->user()))
                                <form method="POST" action="{{ route('follow', $user) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-light">Follow Back</button>
                                </form>
                            @else
                                @if (auth()->user()->blocking && auth()->user()->blocking->contains($user))
                                    <p>This user has blocked you.</p>
                                    @php
                                        $isDisabled = true;
                                    @endphp
                                @elseif($user->blocking && $user->blocking->contains(auth()->user()))
                                    @php
                                        $isDisabledUnblock = true;
                                    @endphp
                                @endif

                                <form method="POST" action="{{ route('follow', $user) }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn {{ $isDisabled ? 'd-none' : 'btn-light' }} {{ $isDisabledUnblock ? 'd-none' : 'btn-light' }}">Follow</button>
                                </form>
                            @endif
                        @endif

                        @if (@auth()->user()->is($user))
                            <svg data-bs-toggle="modal" data-bs-target="#menuModal" id="menu" width="24"
                                height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path
                                    d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"
                                    style="fill: white" />
                            </svg>
                        @endif
                        @if (auth()->user()->isNot($user))
                            <svg data-bs-toggle="modal" data-bs-target="#usermenuModal" id="menu" width="24"
                                height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="{{ $isDisabled ? 'd-none' : 'btn-light' }}">
                                <path
                                    d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"
                                    style="fill: white" />
                            </svg>
                        @endif
                    </div>

                    <p class="nick_name">{{ $user->full_name }}</p>
                    <p class="desc">
                        @if (!@empty($user->website))
                            <a href={{ $user->website }}>{{ $user->website }}</a>
                        @endif
                    </p>
                    <p class="desc">{{ $user->bio }}</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="posts_profile">
            <ul class="nav-pills w-100 d-flex justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item mx-2" role="presentation">
                    <button class="nav-link text-white active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        <svg aria-label="" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="12"
                            role="img" viewBox="0 0 24 24" width="12">
                            <title></title>
                            <rect fill="none" height="18" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" width="18" x="3" y="3"></rect>
                            <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" x1="9.015" x2="9.015" y1="3" y2="21"></line>
                            <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" x1="14.985" x2="14.985" y1="3" y2="21"></line>
                            <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" x1="21" x2="3" y1="9.015" y2="9.015"></line>
                            <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" x1="21" x2="3" y1="14.985" y2="14.985"></line>
                        </svg>
                        <span class="ps-1">POSTS</span>
                    </button>
                </li>
                <li class="nav-item mx-2" role="presentation">
                    <button class="nav-link text-white" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        <svg aria-label="" class="x1lliihq x1n2onr6 x1roi4f4" fill="currentColor" height="12"
                            role="img" viewBox="0 0 24 24" width="12">
                            <title></title>
                            <polygon fill="none" points="20 21 12 13.44 4 21 4 3 20 3 20 21" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polygon>
                        </svg>
                        <span class="ps-1">SAVED</span>
                    </button>
                </li>
                <li class="nav-item mx-2" role="presentation">
                    <button class="nav-link text-white" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">
                        <svg aria-label="" class="x1lliihq x1n2onr6 x1roi4f4" fill="currentColor" height="12"
                            role="img" viewBox="0 0 24 24" width="12">
                            <title></title>
                            <path
                                d="M10.201 3.797 12 1.997l1.799 1.8a1.59 1.59 0 0 0 1.124.465h5.259A1.818 1.818 0 0 1 22 6.08v14.104a1.818 1.818 0 0 1-1.818 1.818H3.818A1.818 1.818 0 0 1 2 20.184V6.08a1.818 1.818 0 0 1 1.818-1.818h5.26a1.59 1.59 0 0 0 1.123-.465Z"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"></path>
                            <path
                                d="M18.598 22.002V21.4a3.949 3.949 0 0 0-3.948-3.949H9.495A3.949 3.949 0 0 0 5.546 21.4v.603"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"></path>
                            <circle cx="12.072" cy="11.075" fill="none" r="3.556" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                        </svg>
                        <span class="ps-1">TAGGED</span>
                    </button>
                </li>
            </ul>
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
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <div id="saved_sec" class="post d-grid gap-3" style="grid-template-columns: repeat(3, 1fr);">
                        @foreach ($savedPosts as $savedPost)
                            <div class="item bg-white">

                                @if ($savedPost->images->isEmpty())
                                    <div class="video-container" style="width: 100%; height: 100%; overflow: hidden;">
                                        <video id="{{ $post->id }}" class="saved-posts-video"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                            <source src="{{ $savedPost->videos->first()->url }}" type="video/mp4"
                                                autoplay="false">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @else
                                    <div style="width: 100%; height: 100%; overflow: hidden;">
                                        @if ($savedPost->images->count() > 1)
                                            <div class="multiple-images-icon position-absolute top-3 start-3">
                                                <svg width="30" height="24">
                                                    <rect x="5" y="5" width="15" height="2" fill="white" />
                                                    <rect x="5" y="10" width="15" height="2" fill="white" />
                                                    <rect x="5" y="15" width="15" height="2" fill="white" />
                                                </svg>
                                            </div>
                                        @endif
                                        <img id="{{ $savedPost['pivot']['post_id'] }}"
                                            class="img-fluid item_img saved-posts-img test"
                                            src={{ $savedPost->images->first()->url }} alt=""
                                            data-image-url="{{ $savedPost->images->first()->url }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                @endif
                            </div>
                            @include('layouts.savedPostModal', ['post' => $savedPost])
                            @include('layouts.commentsIcon', ['post' => $savedPost])
                            @include('layouts.deleteMenu', ['post' => $savedPost])
                            <div class="modal fade" id="likersModal2" tabindex="-1" aria-labelledby="likersModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                    <div class="modal-content bg-dark text-white">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="likersModalLabel2">Likes</h1>
                                            <i class="btn-close fa-2x fa-solid fa-xmark text-white"
                                                data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"
                                                id="likersClose2"></i>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                tabindex="0">
                <div id="tagged" class="post">
                    <div class="item">
                        <img class="img-fluid item_img" src="https://i.ibb.co/Zhc5hHp/account4.jpg" alt="">
                    </div>
                    <div class="item">
                        <img class="img-fluid item_img" src="https://i.ibb.co/SPTNbJL/account5.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="followersModal" tabindex="-1" aria-labelledby="followersModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h1 class="modal-title fs-2" id="followersModalLabel">Followers</h1>
                    <i class="btn-close fa-2x fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"
                        aria-hidden="true"></i>
                </div>
                <div class="modal-body">
                    @foreach ($followers as $follower)
                        <div class="d-flex flex-row justify-content-between align-items-center mb-4">
                            <div class="d-flex flex-row align-items-center"><img class="rounded-circle me-3"
                                    src="{{ $follower->avatar ?? asset('homePage/images/profile_img.jpg') }}"
                                    width="55">
                                <div class="d-flex flex-column align-items-start ml-2"><span class="font-weight-bold"
                                        style="font-size: 1.6em;">{{ $follower->full_name }}</span></div>
                            </div>
                            @if (auth()->user()->isNot($follower))
                                @if (auth()->user()->followings && auth()->user()->followings->contains($follower))
                                    <form method="POST" action="{{ route('unfollow', $follower) }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mt-2">
                                            <button type="submit"
                                                class="btn  btn-lg bg-secondary  text-white unfollow">Unfollow</button>
                                        </div>
                                    </form>
                                @elseif($follower->followings && $follower->followings->contains(auth()->user()))
                                    <form method="POST" action="{{ route('follow', $follower) }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mt-2">
                                            <button type="submit" class="btn btn-primary btn-lg ">Follow Back</button>
                                        </div>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('follow', $follower) }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mt-2">
                                            <button type="submit" class="btn btn-primary btn-lg ">Follow</button>
                                        </div>
                                    </form>
                                @endif
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="followingsModal" tabindex="-1" aria-labelledby="followingsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h1 class="modal-title fs-2" id="followingsModalLabel">Followings</h1>
                    <i class="btn-close fa-2x fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"
                        aria-hidden="true"></i>
                </div>
                <div class="modal-body">
                    @foreach ($followings as $following)
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div class="d-flex flex-row align-items-center"><img class="rounded-circle me-3"
                                    src="{{ $following->avatar ?? asset('homePage/images/profile_img.jpg') }}"
                                    width="55">
                                <div class="d-flex flex-column align-items-start "><span class="font-weight-bold"
                                        style="font-size: 1.6em;">{{ $following->full_name }}</span></div>
                            </div>
                            @if (auth()->user()->isNot($following))
                                @if (auth()->user()->followings && auth()->user()->followings->contains($following))
                                    <form method="POST" action="{{ route('unfollow', $following) }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mt-2">
                                            <button type="submit"
                                                class="btn  btn-lg bg-secondary  text-white unfollow">Unfollow</button>
                                        </div>
                                    </form>
                                @elseif($following->followings && $following->followings->contains(auth()->user()))
                                    <form method="POST" action="{{ route('follow', $following) }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mt-2">
                                            <button type="submit" class="btn btn-primary btn-lg ">Follow Back</button>
                                        </div>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('follow', $following) }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mt-2">
                                            <button type="submit" class="btn btn-primary btn-lg ">Follow</button>
                                        </div>
                                    </form>
                                @endif
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="blockedModal" tabindex="-1" aria-labelledby="blockedModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h1 class="modal-title fs-2" id="blockedModalLabel">blocked</h1>
                    <i class="btn-close fa-2x fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"
                        aria-hidden="true"></i>
                </div>
                <div class="modal-body">
                    @foreach ($blocked as $blockedUsr)
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div class="d-flex flex-row align-items-center"><img class="rounded-circle me-3"
                                    src="{{ $blockedUsr->avatar ?? asset('homePage/images/profile_img.jpg') }}"
                                    width="55">
                                <div class="d-flex flex-column align-items-start "><span class="font-weight-bold"
                                        style="font-size: 1.6em;">{{ $blockedUsr->full_name }}</span></div>
                            </div>
                            @if (auth()->user()->isNot($blockedUsr))
                                @if (auth()->user()->blocked && auth()->user()->blocked->contains($blockedUsr))
                                    <form method="POST" action="{{ route('unblock', $blockedUsr) }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mt-2">
                                            <button type="submit"
                                                class="btn  btn-lg bg-secondary  text-white unfollow">Unblock</button>
                                        </div>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('block', $blockedUsr) }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mt-2">
                                            <button type="submit" class="btn btn-primary btn-lg ">Block</button>
                                        </div>
                                    </form>
                                @endif
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h1 class="modal-title fs-2 mx-auto myHov myB" data-bs-toggle="modal" data-bs-target="#blockedModal"
                        id="blocked" style="color: red;">Block List</h1>
                </div>
                <div class="modal-header">
                    <h1 class="modal-title fs-2 mx-auto myHov" id="menuModalLabel2" data-bs-dismiss="modal"
                        aria-label="Close" aria-hidden="true">Cancel</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="usermenuModal" tabindex="-1" aria-labelledby="usermenuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header d-flex justify-content-center">
                    @if ($user->blocking && $user->blocking->contains(auth()->user()))
                        <form method="POST" action="{{ route('unblock', $user) }}">
                            @csrf
                            <button class="modal-title fs-2 mx-auto unblkModalBtn" type="submit">Unblock</button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('block', $user) }}">
                            @csrf
                            <div class="d-flex flex-row align-items-center mt-2">
                                <button class="modal-title fs-2 mx-auto blkModalBtn" type="submit">Block</button>
                            </div>
                        </form>
                    @endif
                </div>
                <div class="modal-header">
                    <h1 class="modal-title fs-2 mx-auto myHov" id="menuModalLabel2" data-bs-dismiss="modal"
                        aria-label="Close" aria-hidden="true">Cancel</h1>
                </div>
            </div>
        </div>
    </div>

    <script></script>
@endsection

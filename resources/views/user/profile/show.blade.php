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
    <div class="profile_container">
        <div class="profile_info">
            <div class="cart">
                <div class="img">
                    <img src="{{ asset('homePage/images/profile_img.jpg') }}" alt="">
                </div>
                <div class="info">
                    <p class="name">
                        {{ $user->username }}
                        <a href="{{ route('user.profile.edit', $user) }}">
                            <button class="edit_profile">
                                Edit profile
                            </button>
                        </a>
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
                            <svg data-bs-toggle="modal" data-bs-target="#menuModal" id="menu"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path
                                    d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"
                                    style="fill: white" />
                            </svg>
                        @endif
                        @if (auth()->user()->isNot($user))
                            <svg data-bs-toggle="modal" data-bs-target="#usermenuModal" id="menu"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="{{ $isDisabled ? 'd-none' : 'btn-light' }}">
                                <path
                                    d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"
                                    style="fill: white" />
                            </svg>
                        @endif
                    </div>

                    <p class="nick_name">{{ $user->username }}</p>
                    <p class="desc">
                        @if (!@empty($user->bio))
                            {{ $user->bio }}
                        @endif
                    </p>
                    <p class="desc">
                        @if (!@empty($user->website))
                            <a href={{ $user->website }}>{{ $user->website }}</a>
                        @endif
                    </p>
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
                    <div id="posts_sec" class="post d-grid gap-3"
                        style="grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));">
                        {{-- <div class="item">
                            <img class="img-fluid item_img" src="https://i.ibb.co/Jqh3rHv/img1.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid item_img" src="https://i.ibb.co/2ZxBFVp/img2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid item_img" src="https://i.ibb.co/5vQt677/img3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid item_img" src="https://i.ibb.co/pJ8thst/account13.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid item_img" src="https://i.ibb.co/j8L7FPY/account10.jpg" alt="">
                        </div> --}}
                        @foreach ($postInfo as $post)
                            <div class="item bg-white">
                                <img class="img-fluid item_img" src={{$post->getImages()->first()->url}}
                                    alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <div id="saved_sec" class="post">
                        <div class="item">
                            <img class="img-fluid item_img" src="https://i.ibb.co/6WvdZS9/account12.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid item_img" src="https://i.ibb.co/pJ8thst/account13.jpg" alt="">
                        </div>

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
                                    src="{{ asset('homePage/images/profile_img.jpg') }}" width="55">
                                <div class="d-flex flex-column align-items-start ml-2"><span class="font-weight-bold"
                                        style="font-size: 1.6em;">{{ $follower->name }}</span></div>
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
                                    src="{{ asset('homePage/images/profile_img.jpg') }}" width="55">
                                <div class="d-flex flex-column align-items-start "><span class="font-weight-bold"
                                        style="font-size: 1.6em;">{{ $following->name }}</span></div>
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
                                    src="{{ asset('homePage/images/profile_img.jpg') }}" width="55">
                                <div class="d-flex flex-column align-items-start "><span class="font-weight-bold"
                                        style="font-size: 1.6em;">{{ $blockedUsr->name }}</span></div>
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

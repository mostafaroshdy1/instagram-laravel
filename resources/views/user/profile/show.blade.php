@extends('layout.insta')
@section('content')
{{-- <h1>User Profile</h1>
<p>{{ $user->name }}</p>
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
    

@endif
{{--  --}}
<div class="container">
    {{-- Profile Info --}}
    <div class="row pt-5 pb-5">
        <div class="col-2"></div>
        <div class="col-3 text-white d-flex align-items-center justify-content-center profile-img ">
            <img src="{{asset('homePage/images/profile_img.jpg')}}" alt="Profile Picture" class="profile-picture rounded-circle">
        </div>
        <div class="col">
            <div class="row">
                <div class="col-3 text-white fs-5 d-flex align-items-center">
                    <p class="pt-1">{{ $user->name }}</p>
                </div>
                <div class="col-3 text-white d-flex align-items-center">
                    <button class="btn btn-secondary btn-md">Edit profile</button>
                </div>
                <div class="col-3 text-white d-flex align-items-center">
                    <i class="material-icons rounded-icon fs-4 ">settings</i>
                </div>
            </div>
            <div class="row">
                <div class="col-3 text-white py-2 d-flex align-items-center">
                    <p>503 Posts</p>
                </div>
                <div class="col-3 text-white py-2 d-flex align-items-center">
                    <p class="clickable">{{$user->followers()->count()}} followers</p>
                </div>
                <div class="col-3 text-white py-2 d-flex align-items-center">
                    <p class="clickable">{{$user->followings()->count()}} following</p>    
                </div>
            </div>
            <div class="row">
                <div class="col-9 text-white py-2 d-flex align-items-center">Ziad Elganzory</div>
            </div>
            <div class="row">
                <div class="col-9 text-white py-2 d-flex align-items-center">
                    <p>
                        {{-- Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. --}}
                        This is a dummy caption
                    </p>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    {{-- Menu Section --}}
    <div class="row border-top text-white">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="row">
                <div class="col-3 py-3 d-flex align-items-center clickable">
                    <div class="row">
                        <div class="col-1">
                            <i class="material-icons">grid_on</i>
                        </div>
                        <div class="col-1">
                            <p>POSTS</p>
                        </div>
                    </div>
                </div>
                <div class="col py-3 d-flex align-items-center"></div>
                <div class="col-3 py-3 d-flex align-items-center clickable">
                    <div class="row">
                        <div class="col-1">
                            <i class="material-icons">bookmark_border</i>
                        </div>
                        <div class="col-1">
                            <p>SAVED</p>
                        </div>
                    </div>
                </div>
                <div class="col py-3 d-flex align-items-center"></div>
                <div class="col-3 py-3 d-flex align-items-center clickable">
                    <div class="row">
                        <div class="col-1">
                            <i class="material-icons">assignment_ind</i>
                        </div>
                        <div class="col-1">
                            <p>TAGGED</p>
                        </div>
                    </div>
                </div>                                
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    {{-- Profile Posts --}}
    <div class="row">
        <div class="col-4">
            <img src="https://via.placeholder.com/600x600" class="img-fluid pb-3" alt="Post">
        </div>
        <div class="col-4">
            <img src="https://via.placeholder.com/600x600" class="img-fluid pb-3" alt="Post">
        </div>
        <div class="col-4">
            <img src="https://via.placeholder.com/600x600" class="img-fluid pb-3" alt="Post">
        </div>
        <div class="col-4">
            <img src="https://via.placeholder.com/600x600" class="img-fluid pb-3" alt="Post">
        </div>
        <div class="col-4">
            <img src="https://via.placeholder.com/600x600" class="img-fluid pb-3" alt="Post">
        </div>
        <div class="col-4">
            <img src="https://via.placeholder.com/600x600" class="img-fluid pb-3" alt="Post">
        </div>
        <div class="col-4">
            <img src="https://via.placeholder.com/600x600" class="img-fluid pb-3" alt="Post">
        </div>
        <div class="col-4">
            <img src="https://via.placeholder.com/600x600" class="img-fluid pb-3" alt="Post">
        </div>
    </div>
</div>

   <div class="modal fade" id="followersModal" tabindex="-1" aria-labelledby="followersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="followersModalLabel">Followers</h1>
                    <i class="btn-close fa-2x fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"></i>
                </div>
                <div class="modal-body">
                    @foreach ($followers as $follower)
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div class="d-flex flex-row align-items-center"><img class="rounded-circle" src="https://i.imgur.com/KmT515u.jpg" width="55">
                                <div class="d-flex flex-column align-items-start ml-2"><span class="font-weight-bold">{{ $follower->name }}</span></div>
                            </div>
                            @if(auth()->user()->isNot($follower))
                                @if(auth()->user()->followings && auth()->user()->followings->contains($follower))
                                    <form method="POST" action="{{ route('unfollow', $follower) }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mt-2">
                                            <button type="submit" class="btn btn-outline-primary btn-sm">Unfollow</button>
                                        </div>
                                    </form>
                                @elseif($follower->followings && $follower->followings->contains(auth()->user()))
                                    <form method="POST" action="{{ route('follow', $follower) }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mt-2">
                                            <button type="submit" class="btn btn-outline-primary btn-sm">Follow Back</button>
                                        </div>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('follow', $follower) }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mt-2">
                                            <button type="submit" class="btn btn-outline-primary btn-sm">Follow</button>
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

    <div class="modal fade" id="followingsModal" tabindex="-1" aria-labelledby="followingsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="followingsModalLabel">Followings</h1>
                    <i class="btn-close fa-2x fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"></i>
                </div>
                <div class="modal-body">
                    @foreach ($followings as $following)
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div class="d-flex flex-row align-items-center"><img class="rounded-circle" src="https://i.imgur.com/KmT515u.jpg" width="55">
                                <div class="d-flex flex-column align-items-start ml-2"><span class="font-weight-bold">{{ $following->name }}</span></div>
                            </div>
                            @if(auth()->user()->isNot($following))
                                @if(auth()->user()->followings && auth()->user()->followings->contains($following))
                                    <form method="POST" action="{{ route('unfollow', $following) }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mt-2">
                                            <button type="submit" class="btn btn-outline-primary btn-sm">Unfollow</button>
                                        </div>
                                    </form>
                                @elseif($following->followings && $following->followings->contains(auth()->user()))
                                    <form method="POST" action="{{ route('follow', $following) }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mt-2">
                                            <button type="submit" class="btn btn-outline-primary btn-sm">Follow Back</button>
                                        </div>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('follow', $following) }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mt-2">
                                            <button type="submit" class="btn btn-outline-primary btn-sm">Follow</button>
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

    <script>
    document.getElementById('followers').addEventListener('click', function () {
        $('#followersModal').modal('show');
    });
    document.getElementById('followings').addEventListener('click', function () {
        $('#followingsModal').modal('show');
    });
    document.querySelectorAll('.btn-close').forEach(function (btn) {
        btn.addEventListener('click', function () {
            $('#followersModal').modal('hide');
            $('#followingsModal').modal('hide');
        });
    });
</script>
@endsection
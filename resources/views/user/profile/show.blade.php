@extends('layouts.main')
@section('content')
<h1>User Profile</h1>
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
<p>Number of followers: {{$user->followers()->count()}}</p>
<p>Number of followings: {{$user->followings()->count()}}</p>

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
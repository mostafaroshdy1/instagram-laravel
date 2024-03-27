<h1>User Profile</h1>
<p>{{ $user->name }}</p>


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
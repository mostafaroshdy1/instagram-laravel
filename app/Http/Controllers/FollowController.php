<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // follow users except the authenticated user
    public function follow(User $user)
    {
        if (auth()->id() !== $user->id) {
            $user->followers()->attach(auth()->id());
        }
        return back();
    }

    public function unfollow(User $user)
    {
        $user->followers()->detach(auth()->id());
        return back();
    }
    public function block(User $user)
    {
        if (auth()->id() !== $user->id) {
            if ($user->followers()->where('follower_id', auth()->id())->exists()) {
                $user->followers()->detach(auth()->id());
            }
            if ($user->followings()->where('user_id', auth()->id())->exists()) {
                $user->followings()->detach(auth()->id());
            }
            $user->blocking()->attach(auth()->id());
        }
        return back();
    }

    public function unblock(User $user)
    {
        $user->blocking()->detach(auth()->id());
        return back();
    }
}

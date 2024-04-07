<?php

namespace App\Http\Controllers;

use App\helpers\PostInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.profile.index');
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
        $user = User::findOrFail($id);
        // dd($user->name);
        $followers = $user->followers()->get();
        $followings = $user->followings()->get();
        $blocking = $user->blocking()->get();
        $blocked= $user->blocked()->get();
        $posts = $user->posts()->get();
        $postInfoArr = $posts->map(
            function ($post) {
                return new PostInformation($post);
            }
        );
        return view('user.profile.show', ['user' => $user, 'followers' => $followers, 'followings' => $followings, 'blocking' => $blocking, 'blocked' => $blocked, 'postInfo' => $postInfoArr]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user =User::findOrFail($id);
        return view('user.profile.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function getForm(Request $request,$id,$formId)
    {
        $user = User::findOrFail($id);
        // Here you can dynamically render the Blade component based on the $formId
        $formView = View::make('component.edit_forms.'.$formId, ['user' => $user, 'request' => $request])->render();
        return $formView;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

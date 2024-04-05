<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return view('user.profile.show',['user' => $user, 'followers' => $followers, 'followings' => $followings, 'blocking' => $blocking, 'blocked' => $blocked]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user =User::findOrFail($id);
        return view('user.profile.edit',['user'=>$user]);
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

    public function search(Request $request)
    {
        $query = $request->query('query');

        $results = [];

        if (!empty($query)) {
            $results = User::where('full_name', 'like', "%$query%")
                        ->orWhere('username', 'like', "%$query%")
                        ->get();
        }

        return response()->json($results);
    }

}

<?php

namespace App\Http\Controllers;

use App\helpers\PostInformation;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
    // public function show(string $id)
    // {

    //     $user = User::findOrFail($id);
    //     if(!$user->isAdmin){
    //       // dd($user->name);
    //       $followers = $user->followers()->get();
    //       $followings = $user->followings()->get();
    //       $blocking = $user->blocking()->get();
    //       $blocked= $user->blocked()->get();
    //       $posts = $user->posts()->get();
    //       $postInfoArr = $posts->map(
    //           function ($post) {
    //               return new PostInformation($post);
    //           }
    //       );

    //       $savedPosts = $user->savePosts()->with('users')->get();

    //       $savedPostInfoArr = $savedPosts->map(
    //           function ($savedPost) {
    //               return new PostInformation($savedPost);
    //           }
    //       );

    //       // foreach ($savedPosts as $savedPost) {
    //       //     dd($savedPost->body);
    //       // }

    //       return view(
    //           'user.profile.show',
    //           [
    //               'user' => $user, 'followers' => $followers, 'followings' => $followings,
    //               'blocking' => $blocking, 'blocked' => $blocked, 'postInfo' => $postInfoArr,
    //               'savedPostInfoArr'=>$savedPostInfoArr
    //           ]
    //       );
    //     }
    //     else{
    //         return redirect()->route('posts.index');
    //     }
    // }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        if (!$user->isAdmin) {
            $followers = $user->followers()->get();
            $followings = $user->followings()->get();
            $blocking = $user->blocking()->get();
            $blocked = $user->blocked()->get();
            $posts = $user->posts()->get();
            $savedPosts = $user->savePosts()->with('users')->get();

            return view('user.profile.show', [
                'user' => $user,
                'followers' => $followers,
                'followings' => $followings,
                'blocking' => $blocking,
                'blocked' => $blocked,
                'posts' => $posts,
                'savedPosts' => $savedPosts
            ]);
        } else {
            return redirect()->route('posts.index');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.profile.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'username' => ['nullable', 'string', 'regex:/^(?=.{1,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/'],
                'name' => ['nullable', 'string', 'max:20'],
                'website' => ['nullable', 'url'],
                'bio' => ['nullable', 'string'],
                'photo' => ['nullable', 'file']
            ]
        );

        $user = User::find($id);
        isset($request->username) && User::whereNotIn('id', array($user->id))->where('username', '=', $request->username)->count() <= 0 ? $user->username = $request->username : '';
        isset($request->name) ? $user->full_name = $request->name : '';
        isset($request->website) ? $user->website = $request->website : '';
        isset($request->bio) ? $user->bio = $request->bio : '';
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $uploadedFileUrl = Cloudinary::upload($file->getRealPath())->getSecurePath();
            $user->avatar = $uploadedFileUrl;
        }
        $user->save();

        return redirect()->route('user.profile.edit', ['id' => $user->id]);
    }

    public function getForm(Request $request, $id, $formId)
    {
        $user = User::findOrFail($id);
        // Here you can dynamically render the Blade component based on the $formId
        $formView = View::make('component.edit_forms.' . $formId, ['user' => $user, 'request' => $request])->render();
        return $formView;
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
        try {
            $query = $request->query('query');

            $results = [];

            if (!empty($query)) {
                $users = User::where('full_name', 'like', "%$query%")
                    ->orWhere('username', 'like', "%$query%")
                    ->get();

                foreach ($users as $user) {
                    $profileImage = $user->avatar ? $user->avatar : null;
                    $results[] = [
                        'user' => $user,
                        'profile_image' => $profileImage
                    ];
                }
            }

            return response()->json($results);
        } catch (\Exception $e) {
            Log::error('Search Error: ' . $e->getMessage());

            return response()->json(['error' => 'Error during the search.'], 500);
        }
    }
}

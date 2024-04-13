<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Image;
use App\Models\User;
use App\Models\Video;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hashtag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Generate a unique cache key based on the current page number
        $cacheKey = 'posts_page_' . $request->page;

        $posts = Cache::remember($cacheKey, 60, function () {
            $current_user = User::find(auth()->id());
            $followersIds = $current_user->followings()->pluck('id')->toArray();
            return  Post::whereIn('user_id', $followersIds)
                ->orWhere('user_id', auth()->id())
                ->with(['comments.user', 'comments.likes', 'user'])
                ->withCount('comments') // comments_count
                ->orderBy('created_at', 'desc')
                ->paginate(3);
        });
        $current_user = User::find(auth()->id());

        $unfollowedUsers = User::whereNotIn('id', $current_user->followings()->pluck('id'))
            ->where('id', '!=', auth()->id())
            ->take(5)
            ->get();


        if ($request->ajax()) {
            $view = view('posts.load', compact('posts'))->render();
            return Response::json(['view' => $view, 'nextPageUrl' => $posts->nextPageUrl(), 'user' => auth()->user()]);
        }

        return view('posts.index', ['posts' => $posts, 'user' => auth()->user(), "unfollowedUsers" => $unfollowedUsers]);
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
        try {
            // Check if files exist in the request
            $files = $request->file('files');
            if (!$files) {
                return response()->json(['error' => 'No files received'], 400);
            }

            // Create a new post and save it to the database
            $post = new Post();
            $post->body = $request->input('body');
            $post->user_id = Auth::id();
            $post->save();

            // Save the post ID to use when saving images or videos
            $postId = $post->id;

            $hashtags = [];

            preg_match_all('/#\w+/', $post->body, $matches);
            $hashtags = $matches[0];

            foreach ($hashtags as $hashtag) {
                $hashtag = ltrim($hashtag, '#');
                $tag = Hashtag::where('name', '=', $hashtag)->first();
                if ($tag === null) {
                    $tag = new Hashtag();
                    $tag->name = $hashtag;
                    $tag->timestamps = now();
                    $tag->save();
                }
                $post->hashtags()->attach($tag->id);
            }

            foreach ($files as $file) {
                if ($file->getClientOriginalExtension() === 'mp4' || $file->getClientOriginalExtension() === 'mov' || $file->getClientOriginalExtension() === 'avi' || $file->getClientOriginalExtension() === 'mkv') {
                    // Handle video file
                    $video = new Video();
                    $uploadedFileUrl = Cloudinary::upload($file->getRealPath(), [
                        "resource_type" => "video",
                        "folder" => "videos",
                        "transformation" => [
                            "width" => 640,
                            "height" => 480,
                            "crop" => "fill",
                            "format" => "mp4"
                        ]
                    ])->getSecurePath();
                    $video->url = $uploadedFileUrl;
                    $video->post_id = $postId;
                    $video->save();
                } else {
                    // Handle image file
                    $image = new Image();
                    $uploadedFileUrl = Cloudinary::upload($file->getRealPath())->getSecurePath();
                    $image->url = $uploadedFileUrl;
                    $image->post_id = $postId;
                    $image->save();
                }
            }
            return response()->json(['message' => 'Post created successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        view('layouts.postModal', compact('post'));
    }

    public function showSaved(string $id)
    {
        $post = Post::findOrFail($id);
        view('layouts.savedPostModal', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
    public function toggleLike(Post $post, Request $request)
    {
        // return response()->json(['post' => $post]);
        if ($post->likes->contains('user_id', auth()->id())) {
            $post->likes()->where('user_id', auth()->id())->delete();
            $post->decrement('likes_count');
            $isLiked = false;
            $likers = $post->likers;
        } else {
            $post->likes()->create([
                'user_id' => auth()->id()
            ]);
            $post->increment('likes_count');
            $isLiked = true;
            $likers = $post->likers;
        }

        return response()->json([
            'likes_count' => $post->likes_count,
            'isLiked' => $isLiked,
            'likers' => $likers
        ]);
    }


    public function save(Request $request)
    {
        $user = auth()->user();
        $user = User::find($user->id);
        $postId = $request->post_id;

        if ($user->savePosts()->where('post_id', $postId)->exists()) {
            $user->savePosts()->detach($postId);
            return response()->json(['warning' => 'Post already saved. It has been removed from saved posts.'], 200);
        }

        $user->savePosts()->attach($request->post_id);
        return response()->json(['success' => 'Post saved successfully!'], 200);
    }
}

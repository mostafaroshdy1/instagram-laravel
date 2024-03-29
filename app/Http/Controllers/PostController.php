<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Image;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all()->sortDesc(); // will be changed later
        return view('posts/index', ['posts' => $posts]);
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
            // Validation and image upload can be added here

            // Check if image files exist in the request
            $imgFiles = $request->file('img');
            if (!$imgFiles) {
                return response()->json(['error' => 'No image files received'], 400);
            }

            // Create a new post and save it to the database
            $post = new Post();
            $post->body = $request->input('body');
            $post->user_id = Auth::id();
            $post->save();

            // Save the post ID to use when saving images
            $postId = $post->id;

            // Upload each image to Cloudinary (assuming you're using Cloudinary)
            foreach ($imgFiles as $imgFile) {
                $image = new Image();

                // Upload each image to Cloudinary
                $uploadedFileUrl = Cloudinary::upload($imgFile->getRealPath())->getSecurePath();
                $image->url = $uploadedFileUrl;
                $image->post_id = $postId;
                $image->save();
            }

            return response()->json(['message' => 'Post created successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }





    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
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
    public function destroy(Post $post)
    {
        //
    }
}

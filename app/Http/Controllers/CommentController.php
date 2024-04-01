<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;


class CommentController extends Controller
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
        $request->validate([
            'comment' => 'required',
        ]);

        // $post = Post::find($id);
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->post_id;

        // dd($post->body);
        $comment->save();

        // return redirect()->back()->with('success', 'Comment added successfully');

        $user = $comment->user;

        return response()->json([
            'user' => $user,
            'comment' => $comment->comment,
            'comment_id' => $comment->id,
        ]);
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


    public function like(Comment $comment)
    {
        $comment->likes()->attach(auth()->id());

        $isLiked = true;
        $likeCount = $comment->likes()->count();

        return response()->json(['liked' => $isLiked, 'likes_count' => $likeCount]);
    }

    public function unlike(Comment $comment)
    {
        $comment->likes()->detach(auth()->id());

        $isLiked = false;
        $likeCount = $comment->likes()->count();

        return response()->json(['liked' => $isLiked, 'likes_count' => $likeCount]);
    }
}

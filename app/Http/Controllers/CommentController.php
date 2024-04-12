<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Comments_like;

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
    public function destroy(Comment $comment)
    {
        if (auth()->user()->id !== $comment->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        $postId = $comment->post_id;

        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully', 'post_id' => $postId]);
    }




    public function like(Comment $comment, Request $request)
    {

        // return response()->json(['id' => $comment->id]);

        // if ($comment->likes->contains('user_id', auth()->id())) {
        //     $comment->likes()->where('user_id', auth()->id())->delete();
        //     $isLiked = false;
        // } else {
        //     Comments_like::create(['user_id' => auth()->id(), 'comment_id' => $comment->id]);
        //     $isLiked = true;
        // }

        // // $likeCount = Comments_like::where('comment_id', $comment->id)->count();
        // $likeCount = 0;

        // return response()->json(['liked' => $isLiked, 'likes_count' => $likeCount]);
        // return response()->json(['post' => $comment]);

        if ($comment->likes->contains('user_id', auth()->id())) {
            $comment->likes()->where('user_id', auth()->id())->delete();
            $isLiked = false;
        } else {
            $comment->likes()->create([
                'user_id' => auth()->id()
            ]);
            $isLiked = true;
        }

        return response()->json(['liked' => $isLiked, 'likes_count' => $comment->likes()->count()]);
    }
}

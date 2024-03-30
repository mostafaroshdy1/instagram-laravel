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

        return redirect()->back()->with('success', 'Comment added successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comments = $post->comments()->paginate(10); // Adjust the pagination as per your requirement

        return view('comments.index', compact('comments', 'post'));
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

    public function fetchComments($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments()->get(); 

        return response()->json($comments);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use Illuminate\Http\Request;

class HashtagsController extends Controller
{
    /**
     * Display posts related to a specific hashtag.
     */
    public function showPosts($hashtag)
    {
        $tag = Hashtag::where('name', $hashtag)->first();

        if ($tag) {
            $posts = $tag->posts()->orderBy('created_at', 'desc')->get();

            return view('hashtags.show', ['posts' => $posts, 'hashtag' => $hashtag]);
        }
    }
}

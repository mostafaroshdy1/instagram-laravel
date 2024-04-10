<?php

namespace App\helpers;


class PostInformation
{
    protected $post;
    protected $postId;
    protected $comments;
    protected $likes;
    protected $images;
    protected $videos;
    protected $hashtags;

    function __construct($post)
    {
        $this->post = $post;
    }

    function getPost()
    {
        return $this->post;
    }

    // TODO: add the relation between the user and the post
    // public function getPostUser()
    // {
    //     return $this->post->users()->get();
    // }

    public function getId()
    {
        $this->postId = $this->post->id;
        return $this->postId;
    }

    public function getComments()
    {
        $this->comments = $this->post->comments()->get();
        return $this->comments;
    }

    public function getLikes()
    {
        $this->likes = $this->post->likes()->get();
        return $this->likes;
    }

    public function getImages()
    {
        $this->images = $this->post->images()->get();
        return $this->images;
    }

    public function getVideos()
    {
        $this->videos = $this->post->videos()->get();
        return $this->videos;
    }

    public function getHashtags()
    {
        $this->hashtags = $this->post->hashtags()->get();
        return $this->hashtags;
    }

    public function getCommentUser($comment)
    {
        $this->getComments();
        return $comment->users()->get();
    }

    public function getCommentLikes($comment)
    {
        return $comment->likes()->get();
    }

    public function getCommentsCount()
    {
        $this->getComments();
        return $this->comments->count();
    }
}

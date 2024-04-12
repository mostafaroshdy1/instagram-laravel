<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id', 'comment'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function likes()
    // {
    //     return $this->belongsToMany(User::class, 'likes', 'comment_id', 'user_id');
    // }
    public function likes()
    {
        return $this->hasMany(Comments_like::class, 'comment_id', 'id');
    }
}

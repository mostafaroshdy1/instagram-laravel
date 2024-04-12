<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments_like extends Model
{
    use HasFactory;
    protected $table = 'comments_likes';
    protected $fillable = ['user_id', 'comment_id'];
    public function post()
    {
        return $this->belongsTo(Comment::class);
    }
}

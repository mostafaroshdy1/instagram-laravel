<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['body', 'user_id'];



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'post_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function likers()
    {
        return $this->hasManyThrough(User::class, Like::class);
    }
}

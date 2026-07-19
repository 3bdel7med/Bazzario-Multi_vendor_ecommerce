<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tag_id',
        'title',
        'content',
        'image',
        'views',
        'likes',
        'dislikes',
        'comments_count',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

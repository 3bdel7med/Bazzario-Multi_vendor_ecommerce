<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;
    protected $fillable = [
        'post_id',
        'user_id',
        'parent_id',
        'content',
        'likes',
        'dislikes'
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    public function childReplies(){
        return $this->hasMany(Comment::class, 'parent_id')->with('childReplies');
    }


  
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }


}

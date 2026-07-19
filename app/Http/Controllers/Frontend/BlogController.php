<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $tags = \App\Models\Tag::all();
        $posts = \App\Models\Post::with('user', 'tag')->paginate(4);
        return view('frontend.blog', compact('tags', 'posts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', ['title' => 'Blog Page', 'posts' => Post::all()]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('post', ['title' => 'Single Post', 'post' => $post]);
    }
}

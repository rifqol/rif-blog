<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {   
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        } elseif(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        } else {
            $title = '';
        }
        return view('posts', ['title' => "All Posts" .  $title, 'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(9)->withQueryString()]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('post', ['title' => 'Single Post', 'post' => $post]);
    }
}

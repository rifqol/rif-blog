<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        return view('posts', ['title' => 'Articles in Category: ' . $category->name, 'posts' => $category->posts->load('category', 'author')]);
    }

    public function index()
    {
        return view('categories', ['title' => 'All Categories', 'categories' => Category::all()]);
    }
}

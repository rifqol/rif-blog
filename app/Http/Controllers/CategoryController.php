<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('posts', ['title' => 'Articles in Category: ' . $category->name, 'posts' => $category->posts]);
    }
}

<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Faker\Provider\Lorem;
use illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class , 'show']);
Route::get('/authors/{user:username}', [AuthorController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

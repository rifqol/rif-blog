<?php

use Faker\Provider\Lorem;
use GuzzleHttp\Promise\Is;
use illuminate\Support\Arr;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;

Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::get('/about', [AboutController::class, 'index'])->middleware('auth');
Route::get('/posts', [PostController::class, 'index'])->middleware('auth');
Route::get('/posts/{post:slug}', [PostController::class , 'show'])->middleware('auth');
Route::get('/authors/{user:username}', [AuthorController::class, 'show'])->middleware('auth');
Route::get('/categories', [CategoryController::class, 'index'])->middleware('auth');
Route::get('/contact', [ContactController::class, 'index'])->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth')->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except(['show'])->middleware('auth');
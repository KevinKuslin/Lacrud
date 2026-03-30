<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route; 

Route::get('/', function () {
    // $posts = Post::all(); 
    // $posts = Post::where('user_id', auth()->id())->get(); 
    $posts = []; 
    $posts = auth()->user()->usersCoolPosts()->latest()->get(); 
    return view('home', ['posts' => $posts]); 
});

Route::post('/register', [UserController::class, 'register']); 
Route::post('login', [UserController::class, 'login']); 
Route::post('/logout', [UserController::class, 'logout']); 
Route::post('/create-post', [PostController::class, 'createPost']); 
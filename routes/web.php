<?php

use App\Http\Controllers\HomeController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::latest()->take(6)->get(); // Los 3 más recientes
    return view('home', compact('posts'));
});
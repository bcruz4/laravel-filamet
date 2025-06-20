<?php

use App\Http\Controllers\HomeController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::latest()->take(4)->get(); // Los 3 más recientes
    return view('home', compact('posts'));
});

/*
<div class="content">
                    <h3>{{ $post->title }}</h3>
                    <p style="margin-bottom: 0.5rem;">{{ Str::limit(strip_tags($post->body), 100) }}</p>
                    <p style="font-size: 0.8rem; color: var(--muted-text);">Publicado el {{ $post->created_at->format('d/m/Y') }}</p>

                    @if($post->pdf_url)
                        <a href="{{ asset('storage/' . $post->pdf_url) }}" target="_blank">📎 Ver PDF</a>
                    @else
                        <a href="#">Leer más</a>
                    @endif
                </div>
*/
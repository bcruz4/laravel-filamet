<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use function Pest\Laravel\post;

class HomeController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        return view('home', ['posts'=>$posts]);
    }
}

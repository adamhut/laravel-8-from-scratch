<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        // $posts = Post::with(['category', 'author'])
        //     ->latest()
        //     ->get();

        return view('posts', [
            'posts' => Post::latest()->filter( request(['search','category']) )->get(),
            'categories' => Category::all(),
            'currentCategory' => request('category') ? Category::firstWhere('slug',request('category')) : null
        ]);
    }


    public function show(Post $post)
    {
         return view('post',[
            'post' => $post,
        ]);
    }


}

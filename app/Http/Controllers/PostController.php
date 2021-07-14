<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search','category'])
            )
            ->paginate(6)
            ->withQueryString(),
            //simplePaginate(6)
        ]);
    }


    public function show(Post $post)
    {
        // add a comment to the given post.
        return view('posts.show',[
            'post' => $post,
        ]);
    }


}

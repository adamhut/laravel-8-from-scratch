<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{

    public function index()
    {
        // dd(Gate::allows('admin'));
        // dd(auth()->user()->can('admin'));
        // dd(auth()->user()->cannot('admin'));
        // $this->authorize('admin');//perform full authorization


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

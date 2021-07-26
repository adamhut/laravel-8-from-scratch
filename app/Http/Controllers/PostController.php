<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

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


    public function create()
    {
        $categories = Category::all();
        // add a comment to the given post.
        return view('posts.create',compact('categories'));
    }


    public function store()
    {
        ddd(request()->all());

        $attributies = request()->validate([
            'title'     =>['required'],
            'excerpt'   => ['required'],
            'body'      => ['required'],
            'category_id' => ['required',Rule::exists('categories','id')],
        ]);

        $attributies['user_id'] = auth()->user()->id;

        $attributies['slug'] = Str::slug($attributies['title']).'-'.rand(1000,9999);

        Post::create($attributies);


        return redirect('/')


    }


}

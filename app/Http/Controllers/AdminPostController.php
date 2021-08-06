<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    //

    public function index()
    {
        return view('admin.posts.index',[
            'posts' => Post::paginate(50)
        ]);
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit',[
            'post'=>$post,
            'categories' => $categories,
        ]);

    }

    public function create()
    {
        $categories = Category::all();
        // add a comment to the given post.
        return view('admin.posts.create', compact('categories'));
    }


    public function store()
    {
        $post = new Post();

        $attributies = $this->validatePost($post);

        $attributies['thumbnail'] = request()->hasFile('thumbnail') ? request()->file('thumbnail')->store('thumbnail') : null;

        $attributies['user_id'] = auth()->user()->id;

        $attributies['slug'] = Str::slug($attributies['title']) . '-' . rand(1000, 9999);

        Post::create($attributies);


        return redirect('/');
    }

    public function update(Post $post)
    {
        $attributies = $this->validatePost($post);

        if(isset($attributies['thumbnail']))
        {
            $attributies['thumbnail'] = request()->file('thumbnail')->store('thumbnail') ;
        }

        $post->update($attributies);

        return back()->with('success','Post Updated!');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }


    protected function validatePost(Post $post=null)
    {

        return  request()->validate([
            'title'     => ['required'],
            'thumbnail' => $post->exists ? ['required', 'image']:['image'],
            'slug'      => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt'   => ['required'],
            'body'      => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

    }
}

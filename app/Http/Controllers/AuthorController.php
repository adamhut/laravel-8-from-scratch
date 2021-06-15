<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{


    public function show(User $author)
    {
        // dd($author->posts);
        $posts = $author->posts->load(['author', 'category']);

        return view('posts.index', [
            'posts' => $posts,
            // 'categories' => Category::all(),
        ]);
    }
}

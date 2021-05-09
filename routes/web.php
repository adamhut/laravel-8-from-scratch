<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts');
});

Route::get('/post/{post}',function($slug){
    $path= __DIR__ . "/../resources/posts/{$slug}.html";

    if(!file_exists($path))
    {

        return redirect('/');
        ddd($path);
        abort(404);
    }

    $post = Cache::remember("posts.{$slug}", now()->addMinutes(5), function () use($path) {
        return file_get_contents($path);
    });

    return view('post',[
        'post' =>$post,
    ]);
})->where('post','[A-z0-9\-_]+');

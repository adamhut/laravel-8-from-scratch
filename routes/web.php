<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
     $posts = Post::all();
    // foreach($files as $file)
    // {
    //     $document = YamlFrontMatter::parseFile(
    //         $file
    //     );

    //     $posts[] = new Post(
    //         $document->title, 
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }
    
    // ddd($posts);

    return view('posts',['posts'=>$posts]);
});

Route::get('/post/{post}',function($slug){
    //Find a post by its slug  and pass it to a view call "post"
    $post = Post::find($slug);

    return view('post',[
        'post' => $post,
    ]);
});

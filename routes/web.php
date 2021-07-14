<?php

use App\Models\Post;
use App\Models\User;
// use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;

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

// Route::get('/', function () {
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

// Illuminate\Support\Facades\DB::listen(function($query){
//     logger($query->sql,$query->bindings);
// });

//     $posts = Post::with(['category','author'])
//         ->latest()
//         ->get();

//     return view('posts',[
//         'posts'=>$posts,
//         'categories' => Category::all(),

//     ]);
// })->name('home');

// Route::get('/posts/{post:slug}',function(Post $post){
//     //Find a post by its slug  and pass it to a view call "post"
//     // $post = Post::find($post);

//     return view('post',[
//         'post' => $post,
//     ]);
// });

// Route::get('categories/{category:slug}',function(Category $category){
//     return view('posts',[
//         'posts' => $category->posts->load(['author','category']),
//         'currentCategory' => $category,
//         'categories' => Category::all(),
//     ]);
// })->name('category');

// Route::get('authors/{author:username}', function (User $author) {
//     $posts = $author->posts->load(['author', 'category']);
//     return view('posts', [
//         'posts' => $posts,
//         'categories' => Category::all(),
//     ]);
// });

// auth()->loginUsingId(1);


Route::post('newsletter',function(){

    request()->validate([
        'email' =>['required','email']
    ]);

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us6'
    ]);

    // $response = $mailchimp->ping->get();
    // $response = $mailchimp->lists->getAllLists();
    // $response = $mailchimp->lists->getList('4d6c1c5401');
    //  $response = $mailchimp->lists->getListMembersInfo("4d6c1c5401");

    try{
        $response = $mailchimp->lists->addListMember("4d6c1c5401", [
            "email_address" => request('email'),
            "status" => "subscribed",
        ]);

        return redirect('/')->with('success','Your are now signed up for our newsletter');

    }catch(\Exception $e){
        \Illuminate\Validation\ValidationException::withMessages([
            'email'=>'This email could not be add to the newsletter list',
        ])
    }


    // ddd($response);

});

Route::get('/', [PostController::class,'index'])->name('home');

Route::get('/posts/{post:slug}',[PostController::class,'show'])->name('post.show');

Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/authors/{author:username}', [AuthorController::class, 'show'])->name('author.show');

Route::post('/posts/{post:slug}/comments',[PostCommentsController::class,'store'])->name('post-comments.store');

//TODO: make it a group
Route::get('register',[RegisterController::class, 'create'])->name('register.create')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->name('login.store')->middleware('guest');

Route::post('logout', [SessionsController::class,'destroy'])->name('logout')->middleware('auth');
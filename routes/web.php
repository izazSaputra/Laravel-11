<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SliderController;

Route::get('/', function () {
    return view('home', ['title' => 'HOME']);
});

Route::get('/posts', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', function( Post $post) {

        return view('post', ['title' => 'First Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function(User $user) {

    return view('posts', ['title' => 'Has Posted: ' . count($user->posts) . ' Articles by ' . $user->name, 'posts' => 
    $user->posts],);
});

Route::get('/categories/{category:slug}', function(Category $category) {

    return view('posts', ['title' => 'Category: ' . $category->name, 'posts' => 
    $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'CONTACT ME']);
});

Route::get('/admin', function () {
    return view('admin', ['title' => 'ABOUT ME' ,             
    'posts' => Post::where('status', '=', 'Not Approve')
    ->filter(request(['search', 'category', 'author']))
        ->latest()
        ->paginate(10)
        ->withQueryString(),
    'category' => Category::all()]);
});

Route::get('report', function(Post $post) {
    return view('report', ['title' => 'Report Post', 'post' => $post]);
});

Route::get('/admin/{post:slug}', function( Post $post) {

    return view('post', ['title' => 'First Post', 'post' => $post]);
})->middleware('role:petugas, operator');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->middleware('role:operator,petugas')
    ->name('posts.destroy');

Route::get('/profile', function (){
    return view('profile', ['title' => 'PROFILE']);
});

Route::post('/posts', [PostController::class, 'store']);

Route::get('/login', function(){
    return view('login');
}); 

Route::get('/register', function() {
    return view('register');
});

Route::post('/register', [UserController::class, 'store']); 

Route::post('/login', [UserController::class, 'authenticate']);

Route::get('/navbar/{id}', [PostController::class, 'show']);

Route::get('/logout', [UserController::class, 'logout']);

Route::post('/post/{id}/update-status', [PostController::class, 'updateStatus'])->name('post.updateStatus');

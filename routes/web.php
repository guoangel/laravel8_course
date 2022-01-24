<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostTagController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCommentController;
use App\Models\Comment;
use App\Mail\CommentPostedMarkdown;
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
    return view('welcome');
});
Route::get('/', [HomeController::class, 'home'])
  ->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])
  ->name('home.contact');

Route::get('/single', AboutController::class);
$posts = [
    1 => [
      'title' => 'Intro to Laravel',
      'content' => 'This is a short intro to Laravel',
      'is_new' => true,
      'has_comments' => true
    ],
    2 => [
      'title' => 'Intro to PHP',
      'content' => 'This is a short intro to PHP',
      'is_new' => false
    ],
    3 => [
      'title' => 'Intro to Golang',
      'content' => 'This is a short intro to Golang',
      'is_new' => false
    ]
  ];
  Route::resource('/posts', PostsController::class);
  Route::get('/posts/tag/{tag}', [PostTagController::class, 'index'])->name('posts.tags.index');
  Route::resource('posts.comments', PostCommentController::class)->only(['index', 'store']);
  Route::resource('users.comments', UserCommentController::class)->only(['store']);
  Route::resource('users', UserController::class)->only(['show', 'edit', 'update']);
  Route::get('mailable', function () {
    $comment = Comment::find(1);
    return new CommentPostedMarkdown($comment);
});
// Route::get('/posts', function () use ($posts) {
//   // dd(request()->all());
//   dd((int)request()->query('page', 1));
//   // compact($posts) === ['posts' => $posts])
//   return view('posts.index', ['posts' => $posts]);
// });

Auth::routes();

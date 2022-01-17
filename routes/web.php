<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AboutController;
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
// Route::get('/posts', function () use ($posts) {
//   // dd(request()->all());
//   dd((int)request()->query('page', 1));
//   // compact($posts) === ['posts' => $posts])
//   return view('posts.index', ['posts' => $posts]);
// });

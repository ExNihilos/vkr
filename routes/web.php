<?php

use App\Http\Controllers\CommentaryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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



//
//Route::get('/', function () {
//    //return view('welcome');
//    return view('start');
//});

//Route::get('/login', function () {
//    return view('login');
//});
//
//Route::get('/home', function () {
//    return view('home');
//});
//
//Route::middleware('app.auth')->group(function () {
//    Route::group(['prefix' => 'user'], function () {
//        Route::get('/get', 'UserController@getUser');
//    });
//});

//Route::get('/',  [PostController::class, 'index'])->name('create');

Route::get('/', [PostController::class, 'index'])->name('post.index');

Route::get('/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('post.store');

Auth::routes();

Route::get('/home', [HomeController::class, 'showPosts'])->name('home');
//Route::get('/commentary', [CommentaryController::class, 'showCommentary'])->name('commentary');
Route::post('/commentaries/store', [CommentaryController::class, 'store'])->name('commentary.store');
Route::get('/home/sort/{type}', [PostController::class, 'sort'])->name('post.sort');
Route::get('home/posts/{id}', [PostController::class, 'showPost'])->name('post.show');
Route::get('/home/posts/{id}/rate', [PostController::class, 'rate'])->name('post.rating');
Route::get('/home/posts/{id}/commentary', [CommentaryController::class, 'rate'])->name('commentary.rating');


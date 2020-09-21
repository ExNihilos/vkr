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


//Route::middleware('app.auth')->group(function () {
//    Route::group(['prefix' => 'user'], function () {
//        Route::get('/get', 'UserController@getUser');
//    });
//});

//Route::group(['middleware' => 'auth:web'],function() {
//
//});


Auth::routes();

Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts/{id}/update', [PostController::class, 'update'])->name('post.update');
Route::post('/posts/store', [PostController::class, 'store'])->name('post.store');
Route::get('/home', [HomeController::class, 'showPosts'])->name('home');
Route::get('/home/sort/{type}', [PostController::class, 'sort'])->name('post.sort');
Route::post('/commentaries/store', [CommentaryController::class, 'store'])->name('commentary.store');

Route::prefix('/posts/{id}')->group(function (){
    Route::get('/', [PostController::class, 'showPost'])->name('post.show');
    Route::get('/rate', [PostController::class, 'rate'])->name('post.rating');
    Route::get('/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::get('/commentary', [CommentaryController::class, 'rate'])->name('commentary.rating');
    Route::get('/commentary/edit', [CommentaryController::class, 'edit'])->name('commentary.edit');
    Route::post('/commentary/{postId}/update', [CommentaryController::class, 'update'])->name('commentary.update');

});



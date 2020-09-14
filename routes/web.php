<?php

use App\Http\Controllers\PostController;
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
    return view('index');
});

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
Route::get('/create', [PostController::class, 'create'])->name('create');
Route::post('/store', [PostController::class, 'store'])->name('store');

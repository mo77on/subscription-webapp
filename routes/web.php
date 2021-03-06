<?php

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
    return view('welcome');
});

Route::post('addpost', ['as' => 'post.add', 'uses' => 'App\Http\Controllers\PostController@store']);

Route::post('/subscribe', ['as' => 'user.subscribe', 'uses' => 'App\Http\Controllers\UserController@register']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

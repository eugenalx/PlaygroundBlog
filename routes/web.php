<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Models\Post;
use App\Models\User;
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


Route::middleware('can:user')->group(function() {
    Route::get('/createPost',[PostController::class,'create']);
    Route::post('/createPost', [PostController::class, 'store']);
    Route::get('/post/{post}/edit', [PostController::class,'edit']);
    Route::patch('/post/{post}/edit', [PostController::class,'update']);
});


Route::get('/',[PostController::class,'showAllPosts'])->middleware('auth');
Route::get('/post/{user}/index', [PostController::class, 'index'])->middleware('auth');
Route::delete('/deletePost/{post}',[PostController::class,'destroy'])->middleware('auth');







Route::get("/login",[SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post("/login",[SessionController::class, 'store'])->name('login')->middleware('guest');
Route::post("/logout",[SessionController::class, 'destroy']);
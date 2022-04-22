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


Route::get('/',[PostController::class,'index'])->middleware('auth');
Route::get('/createPost',[PostController::class,'create'])->middleware('auth');
Route::post('/storePost', [PostController::class, 'store'])->middleware('auth');
Route::get('/showPost/{user}', [PostController::class, 'show1'])->middleware('auth');






Route::get("/login",[SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post("/login",[SessionController::class, 'store'])->name('login')->middleware('guest');
Route::post("/logout",[SessionController::class, 'destroy']);
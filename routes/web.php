<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AddComController;
use App\Http\Controllers\CommentController;

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

//Getting posts of user loging
Route::get('posts/user',[PostController::class,'userPosts'])->name('userPosts');

// Store the Comment
Route::post('comments/{id}',[AddComController::class,'AddCom'])->name('Add.comment');

//To Delete Comment
Route::post('comment/{id}',[AddComController::class,'destroy'])->name('delete.comment');

//All Routes of CRUD Posts
Route::resource('posts',PostController::class);

//Route::resource('comments',CommentController::class);//[UserController::class, 'show']




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

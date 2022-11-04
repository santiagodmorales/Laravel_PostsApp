<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\{PostController,ModalController,CommentController,UserController,ImageController,CommentsModalController};

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

Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
Route::post('/posts',[PostController::class, 'store'])->name('store.index');
Route::get('/posts/modal',[ModalController::class, 'index'])->name('modal-index');
Route::get('/comments/{id}',[CommentController::class, 'index'])->name('comments.index');
Route::post('/comments',[CommentController::class, 'store'])->name('commentsStore.index');
Route::get('/commentModal/{id?}',[CommentsModalController::class, 'index'])->name('Modal-index');
Route::get('/users',[UserController::class, 'index'])->name('users-index');
Route::get('/images/{id?}',[ImageController::class, 'index'])->name('images.index');
Route::get('/images/{filename}',[ImageController::class, 'show'])->name('images.show');
Route::post('/images',[ImageController::class, 'store'])->name('images.store');
Route::delete('/images/{filename}',[ImageController::class, 'destroy'])->name('images.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

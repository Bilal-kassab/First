<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('posts',PostController::class);
Route::get('post/deletedpost',[PostController::class,'showDeletedPost'])->name('deletedpost');
Route::get('post/restore/{id}',[PostController::class,'restore'])->name('restore');

Route::get('post/restoreAll',[PostController::class,'restoreAll'])->name('restoreall');
Route::post('post/delete/{id}',[PostController::class,'delete'])->name('delete');

// Route::get('post/edit/{id}',[PostController::class,'edit'])->name('posts.edit');
// Route::post('post/update/{id}',[PostController::class,'updatee'])->name('posts.update');
 //Route::post('post/delete/{id}',[PostController::class,'delete'])->name('posts.delete');

//  Route::controller(PostController::class)->group(function(){
//         Route::get('posts','index')->name('posts');
//         Route::post('posts/update','update')->name('posts.update');
//         Route::get('posts/edit','edit')->name('posts.edit');
//         Route::get('posts/delete','deletee')->name('posts.delete');
//         Route::get('posts/store','store')->name('posts.store');
//         Route::get('posts/create','create')->name('posts.create');
//  });
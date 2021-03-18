<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\BlogController;
Use App\Http\Controllers\CategoryController;
Use App\Http\Controllers\CommentController;
Use App\Http\Controllers\AdminController;


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
    // return view('welcome');
    return view('Bootstrap/home');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('blog/{id}/delete',[BlogController::class,'destroy']);
Route::get('blog/search',[BlogController::class,'search']);
Route::resource('blog',BlogController::class);

Route::post('blog/{id}/save_comment',[BlogController::class,'save_comment']);
Route::post('blog/{id}/save_reply',[BlogController::class,'save_reply']);

Route::get('admin/category/{id}/delete',[CategoryController::class,'destroy'])->middleware(['auth','isAdmin']);
Route::resource('admin/category',CategoryController::class)->middleware(['auth','isAdmin']);

Route::resource('blog/comment',CommentController::class);

// Route::get('admin/dashboard',)
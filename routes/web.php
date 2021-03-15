<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\BlogController;
Use App\Http\Controllers\CategoryController;
Use App\Http\Controllers\CommentController;


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
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('blog/{id}/delete',[BlogController::class,'destroy']);
Route::resource('blog',BlogController::class);


Route::resource('category',CategoryController::class);

Route::resource('blog/comment',CommentController::class);

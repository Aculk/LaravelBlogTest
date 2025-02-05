<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;

Route::get('/', 'StaticController@index');
Route::get('/about-us', 'StaticController@about');

// Добавляем маршрут для блога
Route::get('/blog', 'BlogController@showBlog');

Route::get('/article/add', 'ArticlesController@create');
Route::post('/article/add', 'ArticlesController@store');

Route::get('/article/{id}/edit', 'ArticlesController@edit');
Route::put('/article/{id}/edit', 'ArticlesController@update');


Route::get('/article/{id}', 'ArticlesController@show');
Route::delete('/article/{id}/delete', 'ArticlesController@destroy');


Route::get('/public/shop', [ProductController::class, 'index']);
Route::get('/public/shop/{id}', [ProductController::class, 'show']);

//Route::resource('/articles', 'ArticlesController');

Auth::routes();

Route::get('/user', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/article/{id}/comment', [CommentController::class, 'store'])->name('comment.store');

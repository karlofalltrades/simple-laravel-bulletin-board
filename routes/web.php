<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth'])->group(function () { 
    Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
    Route::post('/article', [ArticleController::class, 'store']);
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::get('/article/{article}/show', [ArticleController::class, 'show'])->name('article.show');
    Route::put('/article/{article}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/{article}', [ArticleController::class, 'delete'])->name('article.delete');
    Route::post('/article/{article}/comments', [CommentController::class, 'store'])->name('comment.store');

});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

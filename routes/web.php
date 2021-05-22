<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');

Route::get('/blog/{slug}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::patch('blog/{slug}', [BlogController::class, 'update'])->name('blog.update');

Route::delete('blog/{slug}', [BlogController::class, 'destroy'])->name('blog.destroy');

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

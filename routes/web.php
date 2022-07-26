<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/lien-he', [\App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('/lien-he', [\App\Http\Controllers\HomeController::class, 'contactPost'])->name('contactPost');

Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'login']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard',[\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/test', [\App\Http\Controllers\BannerController::class, 'test']);
    Route::resource('product', \App\Http\Controllers\ProductController::class);
    Route::resource('banner', \App\Http\Controllers\BannerController::class);
    Route::resource('category', \App\Http\Controllers\CategoryController::class);
    Route::resource('article', \App\Http\Controllers\ArticleController::class);
    Route::resource('setting', \App\Http\Controllers\SettingController::class);
    Route::resource('contact', \App\Http\Controllers\ContactController::class);
    Route::resource('user', \App\Http\Controllers\UserController::class);
});

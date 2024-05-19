<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;


Route::post('register', [HomeController::class, 'register'])->name('register');
Route::get('news-details/{id?}', [HomeController::class, 'newsDetails'])->name('news.details');
Route::get('news-list/{type?}/{id?}', [HomeController::class, 'newsList'])->name('news.list');


Route::match(['get', 'post'], '/{slug}', [HomeController::class, 'slug'])->where('slug', '.*');

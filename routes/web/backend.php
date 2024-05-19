<?php

//Route Dashboard

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\CMS\BannerController;
use App\Http\Controllers\Admin\CMS\ClientController;
use App\Http\Controllers\Admin\CMS\CsrController;
use App\Http\Controllers\Admin\CMS\FacilityController;
use App\Http\Controllers\Admin\CMS\GalleryController;
use App\Http\Controllers\Admin\CMS\PageController;
use App\Http\Controllers\Admin\CMS\PostController;
use App\Http\Controllers\Admin\CMS\ServiceController;
use App\Http\Controllers\Admin\CMS\TeamController;
use App\Http\Controllers\Admin\CMS\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\News\NewsController;
use App\Http\Controllers\Admin\Settings\SiteSettingController;
use App\Http\Controllers\Admin\UserController;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::resource('dashboard/user', UserController::class)->middleware(['auth']);

// CMS 
Route::resource('cms/post', PostController::class)->middleware(['auth']);

Route::resource('cms/banner', BannerController::class)->middleware(['auth']);
Route::resource('cms/gallery', GalleryController::class)->middleware(['auth']);
Route::resource('cms/testimonial', TestimonialController::class)->middleware(['auth']);
Route::resource('cms/page', PageController::class)->middleware(['auth']);
Route::resource('cms/client', ClientController::class)->middleware(['auth']);
Route::resource('cms/service', ServiceController::class)->middleware(['auth']);
Route::resource('cms/csr', CsrController::class)->middleware(['auth']);
Route::resource('cms/team', TeamController::class)->middleware(['auth']);
Route::resource('cms/facility', FacilityController::class)->middleware(['auth']);

Route::resource('dashboard/news', NewsController::class)->middleware(['auth']);
Route::resource('dashboard/category', CategoryController::class)->middleware(['auth']);
Route::put('dashboard/updateCategory/{id}', [CategoryController::class, 'updateCategory'])->middleware(['auth'])->name('updateCategory');


Route::resource('site-settings', SiteSettingController::class, [
    'names' => [
        'index' => 'dashboard.site-settings.index',
        'create' => 'dashboard.site-settings.create',
        'store' => 'dashboard.site-settings.store',
        'show' => 'dashboard.site-settings.show',
        'update' => 'dashboard.site-settings.update',
        'edit' => 'dashboard.site-settings.edit',
        'destroy' => 'dashboard.site-settings.destroy',
    ]
]);

Route::post('save_image', [NewsController::class, 'save_image'])->middleware(['auth'])->name('save_images');

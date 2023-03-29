<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Image_productController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::prefix(LaravelLocalization::setLocale())->group(function(){

Route::prefix('admin')->name('admin.')->middleware('auth', 'check_user')->group(function() {


    Route::get('/' , [AdminController::class , 'index'])->name('index');

    /////Route Service
    Route::get('services/trash' , [ServiceController::class , 'trash'])->name('services.trash');
    Route::get('services/{id}/restore' , [ServiceController::class , 'restore'])->name('services.restore');
    Route::get('services/{id}/forcedelete' , [ServiceController::class , 'forcedelete'])->name('services.forcedelete');
    Route::resource('service' , ServiceController::class);

    ///////Route Product
    Route::get('products/trash' , [ProductController::class , 'trash'])->name('products.trash');
    Route::get('products/{id}/restore' , [ProductController::class , 'restore'])->name('products.restore');
    Route::get('products/{id}/forcedelete' , [ProductController::class , 'forcedelete'])->name('products.forcedelete');
    Route::resource('product' , ProductController::class);

    ///////Route Category
    Route::get('categories/trash' , [CategoryController::class , 'trash'])->name('categories.trash');
    Route::get('categories/{id}/restore' , [CategoryController::class , 'restore'])->name('categories.restore');
    Route::get('categories/{id}/forcedelete' , [CategoryController::class , 'forcedelete'])->name('categories.forcedelete');
    Route::resource('category' , CategoryController::class);

    ///////Route Branch
    Route::get('branches/trash' , [BranchController::class , 'trash'])->name('branches.trash');
    Route::get('branches/{id}/restore' , [BranchController::class , 'restore'])->name('branches.restore');
    Route::get('branches/{id}/forcedelete' , [BranchController::class , 'forcedelete'])->name('branches.forcedelete');
    Route::resource('branch' , BranchController::class);

    ///////Route Post
    Route::get('posts/trash' , [PostController::class , 'trash'])->name('posts.trash');
    Route::get('posts/{id}/restore' , [PostController::class , 'restore'])->name('posts.restore');
    Route::get('posts/{id}/forcedelete' , [PostController::class , 'forcedelete'])->name('posts.forcedelete');
    Route::resource('post' , PostController::class);


});
    //Site view
    Route::get('/' , [SiteController::class , 'index'])->name('site.index');
    Route::get('/about' , [SiteController::class , 'about'])->name('site.about');
    Route::get('/search' , [SiteController::class , 'search'])->name('site.search');
    Route::get('/service' , [SiteController::class , 'service'])->name('site.service');
    Route::get('/product' , [SiteController::class , 'product'])->name('site.product');
    Route::get('/post' , [SiteController::class , 'post'])->name('site.post');
    Route::get('/reservation', [SiteController::class, 'reservation'])->name('admin.reservation');
    Route::post('reservation', [SiteController::class, 'store_reservation'])->name('site.reservation');
    Route::get('/booking', [SiteController::class, 'booking'])->name('site.booking');
    Route::get('/buying', [SiteController::class, 'buying'])->name('admin.buying');
    Route::post('buying', [SiteController::class, 'store_buying'])->name('site.buying');
     Route::get('contact', [SiteController::class, 'contact'])->name('site.contact');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('not-allowed','not_allowed');

});

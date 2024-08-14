<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/auth/register', [UsersController::class, 'showRegistrationForm'])->name('showRegistrationForm');
Route::post('/auth/register', [UsersController::class, 'register'])->name('register');
Route::get('/auth/login', [UsersController::class, 'showLoginForm'])->name('showLoginForm');

//////////////////////
Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/details/{id}', [SiteController::class, 'details'])->name('details');
Route::get('/category/{id}', [SiteController::class, 'category_products'])->name('category_products');


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_check'])->name('login_check');
// Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group([
    'prefix' => '/dashboard',
    'middleware' => ['IsAdmin'],
    'as' => 'dashboard.'
], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');
    // Route::post('/upload', [UploadController::class, 'upload_image'])->name('upload');
    Route::resource('products', ProductsController::class);
    Route::resource('categories', CategoriesController::class);
});

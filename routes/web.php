<?php

use App\Http\Controllers\Auth\LoginRegisterController;
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
Route::post('/auth/login', [UsersController::class, 'login'])->name('auth.login');

//////////////////////
// Login & Register for user
Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('userlogin', 'login')->name('userlogin');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/', 'mainsite')->name('mainsite');
    Route::post('/logout', 'logout')->name('logout');
});
// site routes
Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/details/{id}', [SiteController::class, 'details'])->name('details');
Route::get('/category/{id}', [SiteController::class, 'category_products'])->name('category_products');

Route::get('/add_product/{id}', [SiteController::class, 'add_product'])->name('add_product');


// dashboard admin login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_check'])->name('login_check');
// Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// dashboard routes
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

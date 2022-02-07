<?php

use App\Http\Controllers\admin\CartController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\frontend\FrontendController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/category', [FrontendController::class, 'category'])->name('frontend.category');
Route::get('/view-category/{id}', [FrontendController::class, 'viewCategory'])->name('frontend.view.category');
Route::get('/view-product/{id}', [FrontendController::class, 'viewProduct'])->name('frontend.view.product');

Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.dashboard');
    });

    // categories
    Route::Resource('/categories', CategoryController::class);

    // products
    Route::Resource('/products', ProductController::class);

// Cart
    Route::post('/add-cart', [CartController::class, 'addToCart']);
});

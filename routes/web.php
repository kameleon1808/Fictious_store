<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Legal\LegalController;
use App\Http\Controllers\Legal\OrdersController;
use App\Http\Controllers\Legal\CartsController;
use App\Http\Controllers\Legal\ShopsController;
use App\Http\Controllers\Legal\HomesPageController;

use App\Http\Controllers\MailController;
use App\Http\Controllers\User\HomePageController as ControllersHomePageController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\UserController; //

use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Controllers\User\HomePageController;


use App\Models\Articles;
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

Route::get('/', function () {
    return view('home');
});

// ================================================================================
Auth::routes();

Route::prefix('user')->name('user.')->group(function () {

    Route::middleware(['guest'])->group(function () {
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        // -----------------------------------------------------------------------------------
        Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
        Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

        Route::get('login/instagram', [App\Http\Controllers\Auth\LoginController::class, 'redirectToInstagram'])->name('login.instagram');
        Route::get('login/instagram/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleInstagramCallback']);
        // -----------------------------------------------------------------------------------
        Route::post('/createe', [UserController::class, 'createe'])->name('createe');
        Route::post('/check', [UserController::class, 'check'])->name('check');
    });
    Route::middleware(['auth'])->group(function () {
        Route::view('/home', 'dashboard.user.home')->name('home');
        Route::get('/home', [ControllersHomePageController::class, 'index'])->name('home');
        // -----------------------------------------------------------------------------------
        Route::get('/edit-pwd', [UserController::class, 'edit'])->name('edit');
        Route::put('update-pwd/{id}', [UserController::class, 'update']);
        // -----------------------------------------------------------------------------------
        Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
        Route::get('/shop/{slug}', [ShopController::class, 'show'])->name('shop.show');

        Route::get('/cart', [CartController::class, 'show']);
        Route::post('/store', [CartController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [CartController::class, 'delete'])->name('delete');
        // -----------------------------------------------------------------------------------
        Route::get('/edit-cart/{id}', [CartController::class, 'edit'])->name('edit');
        Route::put('update-cart/{id}', [CartController::class, 'update']);
        // -----------------------------------------------------------------------------------

        Route::post('/create', [OrderController::class, 'create'])->name('create');

        Route::post('/delete', [UserController::class, 'delete'])->name('delete');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });
});
// ================================================================================

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });
    Route::middleware(['auth:admin'])->group(function () {
        Route::view('/home', 'dashboard.admin.home')->name('home');

        Route::get('/home', [AdminController::class, 'show'])->name('home');

        Route::get('/users', [AdminController::class, 'showUsers'])->name('users');
        Route::get('/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete');

        Route::get('/legals', [AdminController::class, 'showLegals'])->name('legals');
        Route::get('/legals/delete/{id}', [AdminController::class, 'deleteLegals'])->name('delete');

        Route::get('/articles', [AdminController::class, 'showArticles'])->name('articles');
        Route::get('/articles/delete/{id}', [AdminController::class, 'deleteArticles'])->name('delete');
        Route::post('/articles/addArticles', [AdminController::class, 'addArticles'])->name('articles.addArticles');

        Route::get('/orders', [AdminController::class, 'showOrders'])->name('orders');
        Route::get('/orders/delete/{id}', [AdminController::class, 'deleteOrders'])->name('delete');

        Route::get('/carts', [AdminController::class, 'showCarts'])->name('carts');
        Route::get('/carts/delete/{id}', [AdminController::class, 'deleteCarts'])->name('delete');

        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});
// ================================================================================

Route::prefix('legal')->name('legal.')->group(function () {

    Route::middleware(['guest:legal'])->group(function () {
        Route::view('/login', 'dashboard.legal.login')->name('login');
        Route::view('/register', 'dashboard.legal.register')->name('register');
        // -----------------------------------------------------------------------------------
        Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
        Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

        Route::get('login/instagram', [App\Http\Controllers\Auth\LoginController::class, 'redirectToInstagram'])->name('login.instagram');
        Route::get('login/instagram/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleInstagramCallback']);
        // -----------------------------------------------------------------------------------
        Route::post('/createe', [LegalController::class, 'createe'])->name('createe');
        Route::post('/check', [LegalController::class, 'check'])->name('check');
    });
    Route::middleware(['auth:legal'])->group(function () {
        Route::view('/home', 'dashboard.legal.home')->name('home');
        Route::get('/home', [HomesPageController::class, 'index'])->name('home');
        // -----------------------------------------------------------------------------------
        Route::get('/edit-pwd', [LegalController::class, 'edit'])->name('edit');
        Route::put('update-pwd/{id}', [LegalController::class, 'update']);
        // -----------------------------------------------------------------------------------
        Route::get('/shop', [ShopsController::class, 'index'])->name('shop.index');
        Route::get('/shop/{slug}', [ShopsController::class, 'show'])->name('shop.show');

        Route::get('/cart', [CartsController::class, 'show']);
        Route::post('/store', [CartsController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [CartsController::class, 'delete'])->name('delete');
        Route::get('/edit-cart/{id}', [CartsController::class, 'edit'])->name('edit');
        Route::put('update-cart/{id}', [CartsController::class, 'update']);

        Route::post('/create', [OrdersController::class, 'create'])->name('create');

        Route::post('/delete', [LegalController::class, 'delete'])->name('delete');
        Route::post('logout', [LegalController::class, 'logout'])->name('logout');
    });
});
// ================================================================================

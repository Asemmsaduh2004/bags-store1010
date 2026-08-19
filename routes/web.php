<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

// الصفحة الرئيسية والبحث
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');

// مسارات سلة التسوق
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// تسجيل الدخول والخروج
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// المسارات المحمية (لوحة الأدمن)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/add-product', [ProductController::class, 'create'])->name('products.create');
    Route::post('/admin/add-product', [ProductController::class, 'store'])->name('products.store');
    
    // مسار الحذف
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
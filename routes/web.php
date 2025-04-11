<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckAdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


Route::prefix('admin')->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
        Route::get('/add', [ProductController::class, 'addProduct'])->name('admin.products.addProduct');
        Route::post('/add', [ProductController::class, 'addPostProduct'])->name('admin.products.addPostProduct');
        Route::delete('/delete/{id}', [ProductController::class, 'deleteProduct'])->name('admin.products.deleteProduct');
        
        // Xem chi tiết sản phẩm
        Route::get('/detail/{id}', [ProductController::class, 'detailProduct'])->name('admin.products.detailProduct');
        
        // Cập nhật sản phẩm
        Route::get('/update/{id}', [ProductController::class, 'updateProduct'])->name('admin.products.updateProduct');
        Route::patch('/update/{id}', [ProductController::class, 'updatePatchProduct'])->name('admin.products.updatePatchProduct');
    });
});

Route::prefix('admin')->group(function () {
    // Đăng nhập
    Route::get('/login', [AuthenticationController::class, 'login'])->name('admin.login');
    Route::post('/post-login', [AuthenticationController::class, 'postLogin'])->name('admin.postLogin');
    
    // Đăng xuất
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('admin.logout');

    // Đăng ký
    Route::get('/register', [AuthenticationController::class, 'register'])->name('admin.register');
    Route::post('/post-register', [AuthenticationController::class, 'postRegister'])->name('admin.postRegister');
});

Route::middleware([CheckAdminMiddleware::class])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
});

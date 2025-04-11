<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthenController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');




Route::post('login', [AuthenController::class, 'postLogin']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    // http://127.0.0.1:8000/api/list-product
    Route::get('list-product', [ProductController::class, 'getListProducts']); // danh sách
    Route::get('product/{idProduct}', [ProductController::class, 'getProduct']); // lấy 1 product

    Route::post('product', [ProductController::class, 'addProduct']); // thêm mới
    Route::patch('product/{idProduct}', [ProductController::class, 'updateProduct']); // sửa 1 product

    Route::delete('product', [ProductController::class, 'deleteProduct']); // xóa 1 product
});

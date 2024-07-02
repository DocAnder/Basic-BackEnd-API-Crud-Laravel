<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/users', function (Request $request) {
    return response()->json([
        'status'=>true,
        'message'=>"Listar usuários",
    ], 200);
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{product}', [ProductController::class, 'update']);
Route::delete('products/{product}', [ProductController::class, 'destroy']);
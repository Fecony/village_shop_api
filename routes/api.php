<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPurchaseController;
use Illuminate\Support\Facades\Route;

Route::apiResource('products', ProductController::class)->only(['index', 'store', 'destroy']);

Route::post('/products/{product}/purchase', ProductPurchaseController::class);

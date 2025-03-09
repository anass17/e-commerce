<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);

Route::resource('products', ProductController::class);

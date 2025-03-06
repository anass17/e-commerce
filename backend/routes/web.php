<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);
Route::get('/register', [AuthController::class, 'register']);

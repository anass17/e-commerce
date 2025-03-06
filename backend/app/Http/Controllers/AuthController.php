<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AuthController extends Controller
{
    public function register(Request $request) {
        return User::register($request);
    }
}

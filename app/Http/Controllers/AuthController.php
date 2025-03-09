<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AuthController extends Controller
{
    public function register(Request $request) {
        $response = User::register($request);

        echo json_encode($response);
    }
}

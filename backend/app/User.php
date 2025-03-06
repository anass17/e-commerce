<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    // public function login(Request $request) {

    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required|min:8', 
    //     ]);

    //     if ($validator->fails()) {
    //         return Redirect::back()->withErrors(['data' => 'The data you entered is not valid']);
    //     }

    //     $user = User::where('email', $_POST['email']) -> first();
        
    //     if ($user && Hash::check($_POST['password'], $user -> password)) {

    //         Session::put('user_id', $user -> id);
    //         Session::put('email', $user -> email);
    //         Session::put('full_name', $user -> full_name);

    //         return Redirect::to('/questions');

    //     } else {
    //         return Redirect::back()->withErrors(['data' => 'Email or Password are incorrect']);
    //     }
    // }

    static public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|between:3,30',
            'lastName' => 'required|string|between:3,30',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);


        if ($validator->fails()) {
            return 
            ['status' => 'error',
                'message' => 'The data you entered is not valid'
            ];
        }

        $user = User::where('email', $_POST['email']) -> first();
        
        if ($user) {
            return 
            ['status' => 'error',
                'message' => 'This user already Exists'
            ];
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->full_name = $request->name;
        $user->save();
            
        Session::put('user_id', $user -> id);
        Session::put('email', $user -> email);
        Session::put('firstName', $user -> firstName);
        Session::put('lastName', $user -> lastName);

        return 
            ['status' => 'success',
                'message' => ''
            ];
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class User extends Model
{

    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8', 
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'Invalid credentials'], 401);
        }

        $user = User::where('email', $request -> email) -> first();
        
        if ($user && Hash::check($request -> password, $user -> password)) {

            Session::put('user_id', $user -> id);
            Session::put('email', $user -> email);
            Session::put('firstName', $user -> first_name);
            Session::put('lastName', $user -> last_name);

            return response()->json(['status' => 'success', 'data' => ['email' => $user -> email, 'firstName' => $user -> first_name]], 200);

        } else {
            return response()->json(['status' => 'error', 'message' => 'Invalid credentials'], 401);
        }
    }

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

        $user = User::where('email', $request->email) -> first();
        
        if ($user) {
            return 
            ['status' => 'error',
                'message' => 'This user already Exists'
            ];
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->save();
            
        Session::put('user_id', $user -> id);
        Session::put('email', $user -> email);
        Session::put('firstName', $user -> firstName);
        Session::put('lastName', $user -> lastName);

        // return 
        //     ['status' => 'success',
        //         'message' => ''
        //     ];

        return response()->json(['status' => 'success', 'message' => ''], 201);
    }
}

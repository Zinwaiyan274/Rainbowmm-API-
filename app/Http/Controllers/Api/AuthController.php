<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // login process api
    public function login(Request $request){
        $this->loginValidation($request);

        $user = User::where('email', $request->email)->first();

        if($user) {
            if(Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => true,
                    'data' => [
                        'user' => $user,
                        'token' => [$user->createToken(time())->plainTextToken],
                    ]
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Wrong Password'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => "There's no email in our records!"
            ]);
        }
    }

    // register process api
    public function register(Request $request){
        Validator::make($request->all(), [
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
        ])->validate();

        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ];

        User::insert($data);

        return response()->json([
            'status' => true,
            'message' => 'Account Created Successfully!'
        ]);
    }

    // logout process api
    public function logout(Request $request){
        Session::flush();

        $request->user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Token has been deleted!'
        ]);
    }

    // login validation
    private function loginValidation($request){
        Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ])->validate();
    }
}

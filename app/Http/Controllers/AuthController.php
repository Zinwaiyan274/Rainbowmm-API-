<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // login page
    public function loginPage(){
        return view('login');
    }

    // login process
    public function login(Request $request){
        // validation
        $validator = Validator::make($request->all(), [
            'userName' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }

        // login
        if(Auth::attempt(['name' => $request->userName, 'password' => $request->password])){
            return redirect()->route('articlesPage');
        }

        return back()->with(['error' => "Your crenditial doesn't match our record."]);
    }

    // logout process
    public function logoutProcess(){

        Session::flush();

        Auth::logout();

        return redirect()->route('loginPage');
    }
}

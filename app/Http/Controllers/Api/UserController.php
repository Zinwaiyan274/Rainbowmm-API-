<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // user list
    public function userList(){
        $data = User::where('role', 'user')->get();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);

    }

    // update user account
    public function updateUser(Request $request, $id){
        $file = $request->file('img');
        $fileName = uniqid().'_'.$file->getClientOriginalName();
        $file->move(public_path().'/userImg', $fileName);

        $data = [
            'name' => $request->name,
            'image' => $fileName,
            'password' => Hash::make($request->password)
        ];

        User::where('id', $id)->update($data);

        $userData = User::where('id', $id)->first();

        return response()->json([
            'status' => true,
            'message' => 'Account Updated Successfully!',
            'userData' => $userData,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // user details
    public function userDetails(){
        $data = User::where('id', Auth::id())->get();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    // update user account
    public function updateUser(Request $request, $id){
        if($request->image === null){
            $data = [
                'name' => $request->name,
                'image' => null,
                'password' => Hash::make($request->password)
            ];

            User::where('id', $id)->update($data);

            $userData = User::where('id', $id)->first();

            return response()->json([
                'status' => true,
                'message' => 'Account Updated Successfully!',
                'userData' => $userData,
            ]);
        } else {
            $file = $request->file('image');
            $fileName = uniqid().'_'.$file->getClientOriginalName();
            Storage::disk('public')->put('certificate/'.$fileName, File::get($file));

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
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // user list page
    public function userList(){
        $data = User::where('role', 'user')->paginate(7);

        return view('user', compact('data'));
    }

    // user search
    public function userSearch(Request $request){
        $key = $request->searchKey;

        $data = User::where('name', 'like', '%'.$key.'%')
                ->orWhere('email', 'like', '%'.$key.'%')
                ->paginate(7);

        return view('user', compact('data'));
    }

    // user delete
    public function userDelete($id){
        User::where('id', $id)->delete();

        return back()->with(['success' => 'User account have been deleted successfully!']);
    }
}

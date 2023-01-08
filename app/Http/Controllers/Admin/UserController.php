<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // user list page
    public function userList(){
        $data = User::paginate(7);

        return view('user', compact('data'));
    }
}

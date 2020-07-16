<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function insert (Request $request) {
        User::create([
            'username' => $request->username,
            'password' => $request->password,
            'admin_flag' => false
            ]);
            
        return redirect()->back();
    }
}

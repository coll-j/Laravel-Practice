<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\User;

class UserController extends Controller
{
    public function insert (Request $request) {
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'admin_flag' => false
            ]);
            
        return redirect('/');
    }

    public function loginPost(Request $request) {
        $data = User::where('username', $request->username)->first();
        if($data) {
            if(Hash::check($request->password, $data->password)) {
                Session::put('username', $data->username);
                Session::put('id', $data->id);
                return redirect()->route('home');
            }
            else {
                return redirect()->back()->with('alert', 'wrong password');
            }
        }
        else {
            return redirect()->back()->with('alert', 'username not found');
        }
    }

    public function updatePassword (Request $request) {
        Users::find($request->id)->update([
            'password' => Hash::make($request->password)
        ]);
        return view('/');
    }

    public function logout() {
        Session::flush();
        return redirect('/');
    }
}

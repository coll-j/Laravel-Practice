<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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

    public function findUser($username) {
        $data = User::where('username', $username)->first();
        if($data) return $data;
        else return;
    }

    public function changeCheckUser(Request $request){
        $data = self::findUser($request->username);
        if($data) 
        {
            $username = $data->username;
            return view('changepass', compact('username'));
        }
        else return redirect()->route('changepass')->with('alert', 'username not found');
    }

    public function updatePassword (Request $request) {
        User::where('username', $request->username)->first()->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect('/');
    }

    public function loginPost(Request $request) {
        $data = self::findUser($request->username);
        if($data) {
            if(Hash::check($request->password, $data->password)) {
                Session::put('username', $data->username);
                Session::put('id', $data->id);
                $credentials = $request->only('username', 'password');
                if (Auth::attempt($credentials)) {
                    return redirect()->route('home');
                }
            }
            else {
                return redirect()->back()->with('alert', 'wrong password');
            }
        }
        else {
            return redirect()->back()->with('alert', 'username not found');
        }
    }

    public function logout() {
        Session::flush();
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{   
    // get login page
    function login(){
        return view('auth.login');
    }

    // validating login    
    function check(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:5|max:25',
        ]);

        $userInfo = User::where('username', $request->username)->first();

        if (!$userInfo) {
            return back()->with('error','Username or Password is incorrect.');
        }else{
            // check pass
            if (Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('/');
            }else{
                return back()->with('error','Username or Password is incorrect.');
            }
        }
    }

    // logout
    function logout(){
        if (session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }
}

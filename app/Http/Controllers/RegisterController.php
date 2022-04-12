<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function register(){
        return view('auth.register');
    }

    function save(Request $request){
        // validate the data
        $request->validate([
            'name' => 'required',
            'staff_id' => 'required|unique:users|min:4',
            'phone_no' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:5|max:25',
        ]);

        //insert data into DB
        $user = new User;
        $user -> name = $request->name;
        $user -> staff_id = $request->staff_id;
        $user -> phone_no = $request->phone_no;
        $user -> username = $request->username;
        $user -> password = Hash::make($request->password);

        $save = $user->save();

        if($save){
            return back()->with('success','New User has been successfuly added to database.');
         }else{
             return back()->with('error','Something went wrong, try again later.');
         }
    }
}

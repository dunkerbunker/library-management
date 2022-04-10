<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{

    // get dashboard
    function dashboard(){
        $data = ['LoggedUserInfo' => User::where('id', "=", session('LoggedUser'))->first()];
        return view('dashboard', $data);
    }
    
    // get book details
    function bookdetails(){
        $data = ['LoggedUserInfo' => User::where('id', "=", session('LoggedUser'))->first()];
        return view('admin.bookdetails', $data);
    }

    // get boorrowers
    function borrowers(){
        $data = ['LoggedUserInfo' => User::where('id', "=", session('LoggedUser'))->first()];
        return view('admin.borrowers', $data);
    }

    // get book issue
    function bookissue(){
        $data = ['LoggedUserInfo' => User::where('id', "=", session('LoggedUser'))->first()];
        return view('admin.bookissue', $data);
    }

    // get book return
    function bookreturn(){
        $data = ['LoggedUserInfo' => User::where('id', "=", session('LoggedUser'))->first()];
        return view('admin.bookreturn', $data);
    }
    
    // get late return
    function latereturn(){
        $data = ['LoggedUserInfo' => User::where('id', "=", session('LoggedUser'))->first()];
        return view('admin.latereturn', $data);
    }

    // get users page
    function users(){
        $data = ['LoggedUserInfo' => User::where('id', "=", session('LoggedUser'))->first()];
        return view('admin.users', $data);
    }

    // get login info
    function logininformation(){
        $data = ['LoggedUserInfo' => User::where('id', "=", session('LoggedUser'))->first()];
        return view('admin.logininformation', $data);
    }
}

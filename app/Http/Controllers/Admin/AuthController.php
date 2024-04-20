<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function loginPage(Request $request){
        return view("admin.login");
    }


    public function login(Request $request){

        $request->validate([
            'email'    => 'required|email|max:255|min:5',
            'password' => 'required|min:8'
        ]);

        if(auth()->guard('admin')->attempt(['email'=>$request->input('email') , 'password'=>$request->input('password')])){
            return redirect()->route('admin.dashboard');
        };


    }

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login-page');
    }
}

<?php

namespace App\Http\Controllers\moderator;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function loginPage(Request $request){
        return view("moderator.login");
    }


    public function login(Request $request){

        $request->validate([
            'email'    => 'required|email|max:255|min:5',
            'password' => 'required|min:8'
        ]);

        if(auth()->guard('web')->attempt(['email'=>$request->input('email') , 'password'=>$request->input('password')])){
            $user = User::where('email' , $request->email)->first();
            if($user->type == 'admin'){
            return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('moderator.dashboard');

            }
        };


    }

    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }
}

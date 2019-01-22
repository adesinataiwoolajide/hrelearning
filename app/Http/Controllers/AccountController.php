<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
    
    public function login(Request $request)
    {
        $data = [
            "email" => $request->input("email"),
            "password" => $request->input("password"),
        ];
        if(Auth::attempt($data)){
            $usertype = Auth::user()->is_admin;
            if($usertype == "Admin"){
                $request->session()->flash('success', 'Login successfully');
                return redirect()->route("admin.dashboard");
            }elseif($usertype == "Partner"){
                return redirect()->route("student.dashboard");
            }else{
                $message = "Invalid User " ;
                return redirect()->back()->with("error", $message);
            }
        }else{
            $message = "Invalid User Name or Password" ;
            return redirect()->back()->with("error", $message);
        }
    }

    

    public function logout(Request $request)
    {
        Auth::logout();
        return view("auth.login");
    }
}
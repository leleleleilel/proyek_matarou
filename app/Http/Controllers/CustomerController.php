<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
// use Auth;

class CustomerController extends Controller
{
    function gotoregister()
    {
        return view('register');
    }
    function gotologin()
    {
        return view('login');
    }
    function register(Request $request)
    {
        if($request->btnregister)
        {
            User::create(
                [
                    "username"=>$request->username,
                    "password"=>Hash::make($request->password),
                    "nama"=>$request->fullname,
                    "alamat"=>$request->address,
                    "no_telp"=>$request->phone,
                    "email"=>$request->email,
                    "role"=>"customer",
                    "deleted_at"=>null
                ]
            );
            return redirect("/");
        }

    }
    function login(Request $request)
    {
        $credential = [
            "username" => $request->username,
            "password" => $request->password
        ];

        if(Auth::attempt($credential)){
            return redirect('/home');
        }
        else
        {
            return redirect('/');
        }
    }
    function home(){
        if(Auth::user()->role=="customer")
        {
            return view('home');
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}

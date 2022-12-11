<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Rules\cekpassword;
use App\Rules\cekterdaftar;
use Illuminate\Http\Request;
use App\Models\baju;
use App\Models\d_baju;
use App\Models\Dfoto;
use App\Models\kategori;
use App\Models\kode_promo;
use App\Models\size;
use App\Models\User;
use App\Models\cart;

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
            //validation
            $rules = [
                'username'=>['required', 'min:8', 'string','alpha','unique:user,username'],
                'fullname'=>'required | max:50',
                'address'=>'min:12',
                'phone'=>'required | min:8 | max:14',
                'email'=>'required | email',
                'password'=>['required', 'confirmed', 'regex:/^(?:(?=.*[@_!#$%^&*()<>?\/|}{~:])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*)$/','min:8',new cekpassword($request->username)],
                'password_confirmation'=>['required']
            ];
            $message = [
                'username.required'=>"Field harus diisi",
                'fullname.required'=>"Field harus diisi",
                'phone.required'=>"Field harus diisi",
                'email.required'=>"Field harus diisi",
                'password.required'=>"Field harus diisi",
                'password_confirmation.required'=>"Field harus diisi",
                'username.min'=>"Minimal 8 karakter",
                'username.string'=>"Harus huruf semua",
                'fullname.max'=>"Maksimal 50 karakter",
                'address.min'=>"Minimal 12 karakter",
                'phone.min'=>"Minimal 8 digit",
                'phone.max'=>"Maksimal 14 digit"
            ];
            if($request->validate($rules,$message))
            {
                //regist
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

    }
    function login(Request $request)
    {
        $rules=[
            'username'=>['required', new cekterdaftar()],
            'password'=>['required']
        ];
        $message=[
            'username.required'=>"Field harus diisi!",
            'password.required'=>"Field harus diisi!"
        ];
        if($request->validate($rules,$message)){
            $credential = [
                "username" => $request->username,
                "password" => $request->password
            ];

            if(Auth::attempt($credential)){
                return redirect('/home');
            }
            else
            {
                $param['message'] = "Login Failed";
                return redirect('/login')->with($param);
            }
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

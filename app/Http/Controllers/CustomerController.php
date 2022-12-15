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
    function cetak()
    {
        $dbaju = User::find(1)->d_baju;
        dd($dbaju);
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
                //regist (buat email)
                $user = new User;
                $user->username = $request->username;
                $user->password = Hash::make($request->password);
                $user->nama = $request->fullname;
                $user->alamat = $request->address;
                $user->no_telp = $request->phone;
                $user->email = $request->email;
                $user->role = "customer";
                $user->save();
                $user->sendEmailVerificationNotification();
                // User::create(
                //     [
                //         "username"=>$request->username,
                //         "password"=>Hash::make($request->password),
                //         "nama"=>$request->fullname,
                //         "alamat"=>$request->address,
                //         "no_telp"=>$request->phone,
                //         "email"=>$request->email,
                //         "role"=>"customer",
                //         "deleted_at"=>null
                //     ]
                // );
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
            $baju = baju::orderBy('terjual', 'DESC')->get();
            return view('home',[
                "listbaju"=>$baju
            ]);
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect("/");
    }

    public function toCart()
    {
        return view('cart');
    }

    public function toProduct(Request $req)
    {
        $param['baju'] = baju::where('id',$req->id)->first();

        $param['foto_baju'] = Dfoto::where('id_baju',$req->id)->first();

        $param['size'] = d_baju::with('size')
                                ->join('size','d_baju.fk_size','=','size.id')
                                ->where('fk_baju',$req->id)
                                ->get(['d_baju.*','size.nama']);

        //dump($param['size']);
        return view('detailitem',$param);
    }

    public function toHistory()
    {
        return view('history');
    }

    public function tolistproduct(Request $request)
    {
        if (isset($request->filter)){
            $temp = $request->filter;
            if($temp==""||$temp=="all"){
                $baju = baju::all();
            }
            else
            {
                $baju = baju::where('fk_kategori',$temp)->get();
            }
            $list_dfotos = Dfoto::all();
            $kategori = kategori::all();
            return view('products',[
                "products"=>$baju,
                "images"=>$list_dfotos,
                "kategori"=>$kategori,
                "temp"=>$temp
            ]);
        }
        else if(isset($request->keyword)){
            $key = $request->keyword;
            if($key=="")
            {
                return redirect('/customer/catalogue');
            }
            else
            {
                $baju = baju::where('nama','like','%'.$key.'%')->get();
                $list_dfotos = Dfoto::all();
                $kategori = kategori::all();
                return view('products',[
                    "products"=>$baju,
                    "images"=>$list_dfotos,
                    "kategori"=>$kategori,
                    "temp"=>""
                ]);
            }
        }
        else{
            $list_products = baju::all();
            $list_dfotos = Dfoto::all();
            $kategori = kategori::all();
            return view('products',[
                "products"=>$list_products,
                "images"=>$list_dfotos,
                "kategori"=>$kategori,
                "temp"=>""
            ]);
        }
    }
    // public function gantikategori(Request $request)
    // {
    //     $temp = $request->filter;
    //     if($temp==""||$temp=="all"){
    //         $baju = baju::all();
    //     }
    //     else
    //     {
    //         $baju = baju::where('fk_kategori',$temp)->get();
    //     }
    //     $list_dfotos = Dfoto::all();
    //     $kategori = kategori::all();
    //     return view('products',[
    //         "products"=>$baju,
    //         "images"=>$list_dfotos,
    //         "kategori"=>$kategori,
    //         "temp"=>$temp
    //     ]);
    // }
    // function keywordsearch(Request $request)
    // {
    //     $key = $request->keyword;
    //     if($key=="")
    //     {
    //         return redirect('/customer/catalogue');
    //     }
    //     else
    //     {
    //         $baju = baju::where('nama','like','%'.$key.'%')->get();
    //         $list_dfotos = Dfoto::all();
    //         $kategori = kategori::all();
    //         return view('products',[
    //             "products"=>$baju,
    //             "images"=>$list_dfotos,
    //             "kategori"=>$kategori,
    //             "temp"=>""
    //         ]);
    //     }
    // }
}

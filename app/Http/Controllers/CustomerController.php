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
use App\Models\d_trans;
use App\Models\h_trans;
use App\Models\review;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    function gotoregister()
    {
        return view('register',[
            'navAccount'=>"",
            'navHistory'=>"",
            'navHome'=>"",
            'navProduct'=>"",
            'navAbout'=>"",
            'navCart'=>""
        ]);
    }
    function gotologin()
    {
        return view('login',[
            'navAccount'=>"",
            'navHistory'=>"",
            'navHome'=>"",
            'navProduct'=>"",
            'navAbout'=>"",
            'navCart'=>""
        ]);
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
                'email'=>'required | email | unique:user,email',
                'password'=>['required', 'confirmed', 'regex:/^(?:(?=.*[@_!#$%^&*()<>?\/|}{~:])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*)$/','min:8',new cekpassword($request->username)],
                'password_confirmation'=>['required']
            ];
            $message = [
                'username.required'=>"Field harus diisi",
                'fullname.required'=>"Field harus diisi",
                'phone.required'=>"Field harus diisi",
                'email.required'=>"Field harus diisi",
                'email.unique'=>"Email telah digunakan",
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
                return view('login',[
                    'navAccount'=>"",
                    'navHistory'=>"",
                    'navHome'=>"",
                    'navProduct'=>"",
                    'navAbout'=>"",
                    'navCart'=>""
                ]);
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
            $review = review::orderBy('rate','DESC')->get();
            $allhtrans = h_trans::all();
            return view('home',[
                "listbaju"=>$baju,
                "listreview"=>$review,
                "listhtrans"=>$allhtrans,
                'navAccount'=>"",
                'navHistory'=>"",
                'navHome'=>"active",
                'navProduct'=>"",
                'navAbout'=>"",
                'navCart'=>""
            ]);
        }
    }
    function logout()
    {
        Auth::logout();
        return view("login",[
            'navAccount'=>"",
            'navHistory'=>"",
            'navHome'=>"",
            'navProduct'=>"",
            'navAbout'=>"",
            'navCart'=>""
        ]);
    }

    public function toCart()
    {
        return view('cart',[
            'navAccount'=>"",
            'navHistory'=>"",
            'navHome'=>"",
            'navProduct'=>"",
            'navAbout'=>"",
            'navCart'=>"active"
        ]);
    }

    public function toProduct(Request $req)
    {
        $param['baju'] = baju::where('id',$req->id)->first();

        $param['foto_baju'] = Dfoto::where('id_baju',$req->id)->first();

        $param['size'] = d_baju::with('size')
                                ->join('size','d_baju.fk_size','=','size.id')
                                ->where('fk_baju',$req->id)
                                ->get(['d_baju.*','size.nama']);

        $param['review'] = review::join('baju','baju.id','=','fk_baju')
                                ->join('h_trans','h_trans.id','=','fk_htrans')
                                ->join('user','user.id','=','h_trans.id_user')
                                ->where('fk_baju',$req->id)
                                ->get(['user.*','review.*']);

        $total = 0;
        foreach ($param['review'] as $key => $value) {
            $total+=$value->rate;
        }


        $param['avg'] = $total;

        // dump($param['foto_baju']);
        return view('detailitem',[
            'navAccount'=>"",
            'navHistory'=>"",
            'navHome'=>"",
            'navProduct'=>"active",
            'navAbout'=>"",
            'navCart'=>""
        ],$param);
    }

    public function toHistory()
    {
        //Dummy id login
        //session()->put('idxLogin',11);
        // $param['h_trans']=h_trans::select('*')
        //                             ->where('id_user','=',session()->get('idxLogin'))
        //                             ->get();

        $param['h_trans']=DB::select('SELECT *,sum(d_trans.subtotal) as dSub
        FROM `d_trans`
        join h_trans on h_trans.id = d_trans.fk_htrans
        where h_trans.id_user = ?
        GROUP BY h_trans.id;',[session()->get('idxLogin')]);

        return view('history',[
            'navAccount'=>"",
            'navHistory'=>"active",
            'navHome'=>"",
            'navProduct'=>"",
            'navAbout'=>"",
            'navCart'=>""
        ],$param);
    }

    public function toHistoryDetail(Request $req)
    {
        //Dummy id login
        //session()->put('idxLogin',11);

        $param['h_trans']=h_trans::join('kode_promo','kode_promo.id','=','h_trans.fk_kode_promo')
                                    ->where('id_user','=',session()->get('idxLogin'))
                                    ->first(['h_trans.*','kode_promo.nama']);

        $param['d_trans']=d_trans::join('h_trans','h_trans.id','=','fk_htrans')
                                    ->join('d_baju','d_baju.id','=','fk_dbaju')
                                    ->join('baju','baju.id','=','d_baju.fk_baju')
                                    ->where('fk_htrans','=',$req->id)
                                    ->get(['baju.*','d_trans.qty','d_trans.subtotal']);


        $total = 0;
        foreach ($param['d_trans'] as $key => $value) {
            $total+=$value->subtotal;
        }
        $param['allSubTotal']=$total;

        return view('detailhistory',[
            'navAccount'=>"",
            'navHistory'=>"active",
            'navHome'=>"",
            'navProduct'=>"",
            'navAbout'=>"",
            'navCart'=>""
        ],$param);
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
                "temp"=>$temp,
                'navAccount'=>"",
                'navHistory'=>"",
                'navHome'=>"",
                'navProduct'=>"active",
                'navAbout'=>"",
                'navCart'=>""
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
                    "temp"=>"",
                    'navAccount'=>"",
                    'navHistory'=>"",
                    'navHome'=>"",
                    'navProduct'=>"active",
                    'navAbout'=>"",
                    'navCart'=>""
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
                "temp"=>"",
                'navAccount'=>"",
                'navHistory'=>"",
                'navHome'=>"",
                'navProduct'=>"active",
                'navAbout'=>"",
                'navCart'=>""
            ]);
        }
    }
    public function toAboutUs()
    {
        return view('about',[
                'navAccount'=>"",
                'navHistory'=>"",
                'navHome'=>"",
                'navProduct'=>"",
                'navAbout'=>"active",
                'navCart'=>""
            ]);
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

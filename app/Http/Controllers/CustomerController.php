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
use App\Rules\CekPanjangTelepon;
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
        $baju = baju::orderBy('terjual', 'DESC')->get();
        $dfotos = Dfoto::all();

        foreach ($baju as $key => $b) {
            $i = 0;
            foreach ($dfotos as $key => $dfoto) {
                if($dfoto->id_baju==$b->id){
                    $i = $i+1;
                }
            }

            if($i==0){
                $dfoto_baru = new Dfoto();
                $dfoto_baru->id_baju = $b->id;
                $dfoto_baru->nama_file = $b->nama_file;
                $dfoto_baru->save();
            }
        }


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
                if(auth()->user()->role=="customer"){
                    return redirect('/customer/home');
                }else{
                    //admin
                Auth::logout();
                $param['message'] = "Login Failed";
                return redirect('/login')->with($param);
                }
            }
            else
            {
                $param['message'] = "Login Failed";
                return redirect('/login')->with($param);
            }
        }
    }

    public function home_logged_in(){
        if(Auth::user()->role=="customer"){
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

    function home(){
            $baju = baju::orderBy('terjual', 'DESC')->get();
            $dfotos = Dfoto::all();

            foreach ($baju as $key => $b) {
                $i = 0;
                foreach ($dfotos as $key => $dfoto) {
                    if($dfoto->id_baju==$b->id){
                        $i = $i+1;
                    }
                }

                if($i==0){
                    $dfoto_baru = new Dfoto();
                    $dfoto_baru->id_baju = $b->id;
                    $dfoto_baru->nama_file = $b->nama_file;
                    $dfoto_baru->save();
                }
            }

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
        //session()->put('idxLogin',1);
        $param['cart'] = cart::join('d_baju','d_baju.id','=','cart.id_dbaju')
                                ->join('baju','baju.id','=','d_baju.fk_baju')
                                ->join('d_foto_baju','d_foto_baju.id_baju','=','baju.id')
                                ->where('id_user','=',Auth::user()->id)
                                ->get();

        $totalItem = 0;
        $totalHarga = 0;
        foreach ($param['cart'] as $key => $value) {
            $totalItem+=$value->quantity;
            $totalHarga+=$value->quantity*$value->harga;
        }

        $param['totalItem'] = $totalItem;
        $param['totalHarga'] = $totalHarga;

        return view('cart',[
            'navAccount'=>"",
            'navHistory'=>"",
            'navHome'=>"",
            'navProduct'=>"",
            'navAbout'=>"",
            'navCart'=>"active"
        ],$param);
    }

    public function toProduct(Request $req)
    {

        $baju = baju::orderBy('terjual', 'DESC')->get();
        $dfotos = Dfoto::all();

        foreach ($baju as $key => $b) {
            $i = 0;
            foreach ($dfotos as $key => $dfoto) {
                if($dfoto->id_baju==$b->id){
                    $i = $i+1;
                }
            }

            if($i==0){
                $dfoto_baru = new Dfoto();
                $dfoto_baru->id_baju = $b->id;
                $dfoto_baru->nama_file = $b->nama_file;
                $dfoto_baru->save();
            }
        }


        $param['baju'] = baju::where('id',$req->id)->first();

        $param['foto_baju'] = Dfoto::where('id_baju',$req->id)->get();

        $param['size'] = d_baju::join('size','d_baju.fk_size','=','size.id')
                                ->where('fk_baju',$req->id)
                                ->get(['size.*']);

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
        GROUP BY h_trans.id;',[Auth::user()->id]);

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
                                    ->where('id_user','=',Auth::user()->id)
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

        $baju = baju::orderBy('terjual', 'DESC')->get();
        $dfotos = Dfoto::all();

        foreach ($baju as $key => $b) {
            $i = 0;
            foreach ($dfotos as $key => $dfoto) {
                if($dfoto->id_baju==$b->id){
                    $i = $i+1;
                }
            }

            if($i==0){
                $dfoto_baru = new Dfoto();
                $dfoto_baru->id_baju = $b->id;
                $dfoto_baru->nama_file = $b->nama_file;
                $dfoto_baru->save();
            }
        }


        if (isset($request->filter)){
            $temp = $request->filter;
            if($temp==""||$temp=="all"){
                $baju = baju::paginate(6);
            }
            else
            {
                $baju = baju::where('fk_kategori',$temp)->paginate(6);
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
                $baju = baju::where('nama','like','%'.$key.'%')->paginate(6);
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
            $list_products = baju::paginate(6);
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

         $baju = baju::orderBy('terjual', 'DESC')->get();
            $dfotos = Dfoto::all();

            foreach ($baju as $key => $b) {
                $i = 0;
                foreach ($dfotos as $key => $dfoto) {
                    if($dfoto->id_baju==$b->id){
                        $i = $i+1;
                    }
                }

                if($i==0){
                    $dfoto_baru = new Dfoto();
                    $dfoto_baru->id_baju = $b->id;
                    $dfoto_baru->nama_file = $b->nama_file;
                    $dfoto_baru->save();
                }
            }


        return view('about',[
                'navAccount'=>"",
                'navHistory'=>"",
                'navHome'=>"",
                'navProduct'=>"",
                'navAbout'=>"active",
                'navCart'=>""
            ]);
    }


    public function toMyAccount(){
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        return view('myAccount',[
            'navAccount'=>"active",
            'navHistory'=>"",
            'navHome'=>"",
            'navProduct'=>"",
            'navAbout'=>"",
            'navCart'=>"",
            'user'=>$user
        ]);
    }

    public function doEditProfile(Request $request){

        $id = Auth::user()->id;

        $nama = $request->nama;
        $alamat = $request->alamat;
        $no_telp = $request->no_telp;
        $email = $request->email;

        $request->validate([
            'nama'=>'required|max:50',
            'alamat'=>'required|min:12',
            'email'=>'required|email',
            'no_telp'=>['required','numeric',new CekPanjangTelepon()],
        ]);

        $user = User::where('id',$id)->first();
        $users = User::all();
        $email_lama = $user->email;

        $ada_email = false;

        if($email_lama!=$email){

            foreach ($users as $usr) {
                if($usr->email==$email){
                    $ada_email=true;
                    break;
                }
            }
        }

        if($ada_email==false){
            $user->nama = $nama;
            $user->alamat = $alamat;
            $user->no_telp = $no_telp;
            $user->email = $email;
            $user->save();
            $message = "User Profile Edited!";

        }else{
            $message = "Email has already taken!";
        }

        return redirect()->route('toMyAccount')->with("message",[
            "isi" => $message
        ]);
    }

    public function doEditPassword(Request $request){
        $id = Auth::user()->id;

        $password = $request->password;
        $new_password = $request->newpassword;
        $confirm = $request->confirm;

        $user = User::where('id',$id)->first();

        $request->validate([
            'password'=>'required',
            'newpassword'=>'required|same:confirm',
            'confirm'=>'required'
        ]);

        if($password==Hash::check($password,$user->password)){
            if($new_password==$confirm){
                $user->password = Hash::make($new_password);
                $user->save();
                $message = "User Password Edited!";
            }else{
                $message ="Password and Confirmation Password didn't match!";
            }
        }else{
            $message = "Wrong Password! Failed to Edit!";
        }

        return redirect()->route('toMyAccount')->with("message",[
            "isi"=> $message
        ]);

    }

    public function toReview(Request $request){
        $id_trans = $request->idTrans;
        $product = baju::where('id',$request->id)->first();
        $reviews = review::where('fk_baju',$request->id)->get();
        return view('review',[
            "baju" => $product,
            "id_trans"=>$id_trans,
            "reviews"=>$reviews,
            'navAccount'=>"",
            'navHistory'=>"",
            'navHome'=>"",
            'navProduct'=>"",
            'navAbout'=>"",
            'navCart'=>"",
        ]);
    }

    public function doReview(Request $request){
        $id_trans = $request->id_trans;
        $id_baju = $request->id_baju;
        $rate = $request->rate;
        $deskripsi_review = $request->deskripsi_review;
        $message = "";

        $request->validate([
            "rate"=>'required',
            "deskripsi_review"=>'required'
        ]);

        $review = new review();
        $review->rate = $rate;
        $review->deskripsi_review = $deskripsi_review;
        $review->fk_htrans = $id_trans;
        $review->fk_baju = $id_baju;
        $review->save();

        $message = "Review Success!!";

        return redirect()->back()->with("message",[
            "isi"=> $message
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

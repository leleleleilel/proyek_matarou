<?php

namespace App\Http\Controllers;

use App\Models\baju;
use App\Models\d_baju;
use App\Models\Dfoto;
use App\Models\kategori;
use App\Models\kode_promo;
use App\Models\size;
use App\Models\User;
use App\Rules\CekPanjangTelepon;
use App\Rules\CekUsername;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function toLoginAdmin(){
        return view('admin.loginadmin');
    }

    public function toMasterUsers(){
        $list_users = User::withTrashed()->get();
        return view('admin.masterUser',[
            "title"=>"Master User",
            "activeMaster"=>"active",
            "activeReports"=>"",
            "activeReviews"=>"",
            "activeProfile"=>"",
            "users"=>$list_users,
            "mode"=>1
        ]);
    }


    public function toMasterCategories(){
        $list_categories = kategori::withTrashed()->get();
        $kategori = null;
        return view('admin.masterCategories',[
            "title"=>"Master Category",
            "activeMaster"=>"active",
            "activeReports"=>"",
            "activeReviews"=>"",
            "activeProfile"=>"",
            "kategories"=>$list_categories,
            "kategori"=> $kategori,
            "mode"=>1
        ]);
    }

    public function toMasterProducts(){
        $list_categories = kategori::all();
        $list_products = baju::withTrashed()->get();
        $list_dfotos = Dfoto::all();
        return view('admin.masterProducts',[
            "title"=>"Master Product",
            "activeMaster"=>"active",
            "activeReports"=>"",
            "activeReviews"=>"",
            "activeProfile"=>"",
            "kategories"=>$list_categories,
            "products"=>$list_products,
            "images"=>$list_dfotos,
            "categories"=>$list_categories
        ]);
    }

    public function toListReviews(){
        return view('admin.listReviews',[
            "title"=>"Master Product",
            "activeMaster"=> "",
            "activeReports"=>"",
            "activeReviews"=>"active",
            "activeProfile"=>"",
        ]);
    }

    public function doTambahKategori(Request $request){
        $id_edit = (int)$request->id_edit;
        $nama = $request->name;
        $message = "";

        $validate = $request->validate([
            'name'=>'required'
        ]);

        if($id_edit!=-1){
            //jika edit
            $kategori = kategori::where('id', $id_edit)->first();
            $kategori->nama = $nama;
            $kategori->save();

            $message = "Category Edited!";

        }else{
            $kategori = new kategori();
            $kategori->nama = $nama;
            $kategori->save();

            $message = "New Category Added!";

        }
        return redirect()->route('toMasterCategories')->with("message",[
            "isi"=>$message
        ]);
    }

    public function doDeleteKategori(Request $request){
        $id = $request->id;
        $message = "";

        $kategori = kategori::withTrashed()->where('id',$id)->first();
        if($kategori->trashed()){
            $kategori->restore();
            $message = "Restored!";
        }else{
            $kategori->delete();
            $message = "Deleted!";
        }
        return redirect()->route('toMasterCategories')->with("message",[
            "isi"=>$message
        ]);
    }

    public function doDeletePromo(Request $request){
        $id = $request->id;
        $message = "";

        $promo = kode_promo::withTrashed()->where('id',$id)->first();

        if($promo->trashed()){
            $promo->delete();
            $message = "Restored!";
        }else{
            $promo->delete();
            $message = "Deleted!";
        }

        return redirect()->route('toPromoCode')->with("message",[
            "isi"=>$message
        ]);

    }


    public function toEditKategori(Request $request){
        $id = $request->id;
        $kategori = kategori::where("id",$id)->first();

        $list_categories = kategori::withTrashed()->get();
        return view('admin.masterCategories',[
            "title"=>"Master Category",
            "activeMaster"=>"active",
            "activeReports"=>"",
            "activeReviews"=>"",
            "activeProfile"=>"",
            "kategories"=>$list_categories,
            "kategori"=> $kategori,
            "mode"=>2
        ]);

    }

    public function doTambahAdmin(Request $request){

        $id_user = $request->id_user;

        $username = $request->username;
        $nama = $request->full_name;
        $alamat = $request->alamat;
        $no_telp = $request->phone;
        $email = $request->email;

        $message = "";


        if($id_user==-1){
            $validate = $request->validate([
                'username'=>['required','min:8','regex:/^[a-zA-Z]+$/u','alpha',new CekUsername()],
                'full_name'=>'required|max:50',
                'alamat'=>'required|min:12',
                'email'=>'required|email|unique:user,email',
                'phone'=>['required','numeric',new CekPanjangTelepon()],
            ]);

            User::create(
                [
                    //saat membuat user baru, username = password
                    "username"=>$username,
                    "password"=>Hash::make($username),
                    "nama"=>$nama,
                    "alamat"=>$alamat,
                    "no_telp"=>$no_telp,
                    "email"=>$email,
                    "role"=>"admin",
                    "deleted_at"=>null
                ]
            );

          $message = "Register New Admin Success!";
        }else{
            //edit
            $user = User::where('id',$id_user)->first();

            $validate = $request->validate([
                'username'=>['required','min:8','regex:/^[a-zA-Z]+$/u','alpha'],
                'full_name'=>'required|max:50',
                'alamat'=>'required|min:12',
                'email'=>'required|email',
                'phone'=>['required','numeric',new CekPanjangTelepon()]
            ]);

            $users = User::all();
            $username_lama = $user->username;
            $email_lama = $user->email;
            $ada = false;

            if($username_lama!=$username){
                //periksa kembar atau ngga
                foreach ($users as $usr) {
                    if($usr->username==$username){
                        $ada = true;
                        break;
                    }
                }
            }

            if($ada == true){
                $message = "Username has already taken!";
            }else{
                //email check
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
                    $user->username = $username;
                    $user->alamat = $alamat;
                    $user->no_telp = $no_telp;
                    $user->email = $email;
                    $user->save();

                    $message = "User Edited!";
                }else{
                    $message = "Email has already taken!";
                }
            }
        }

        return redirect()->route('toMasterUsers')->with("message",[
            "isi"=>$message
        ]);
    }

    public function toEditUsers(Request $request){
        $id = $request->id;

        $list_users = User::withTrashed()->get();
        $user = User::where('id',$id)->first();
        return view('admin.masterUser',[
            "title"=>"Master User",
            "activeMaster"=>"active",
            "activeReports"=>"",
            "activeReviews"=>"",
            "activeProfile"=>"",
            "users"=>$list_users,
            "user"=>$user,
            "mode"=>2
        ]);

    }

    public function doTambahProduct(Request $request){
        $nama = $request->name;
        $deskripsi = $request->description;
        $harga = $request->price;
        $fk_kategori = $request->category;
        $message = "";

        $validate = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric|gt:0',
            'category'=>'required',
            'photo.*' => 'mimes:png,jpg,jpeg|max:2048',
            'photo'=>'required',
        ]);

        //membuat kode
        $list_barang = baju::withTrashed()->get();
        $kode_barang = "";
        $str_kode_huruf = substr($nama,0,2);
        $str_kode_huruf = strtoupper($str_kode_huruf);

        $urutan = "";
        foreach ($list_barang as $barang) {
           if(strtoupper(substr($barang->kode,0,2))==$str_kode_huruf){
            $urutan = substr($barang->kode,3,2);
           }
        }

        $urutan = (int) $urutan;
        $urutan = $urutan+1;
        $kode_urut = "";

        if($urutan>=0 && $urutan<10){
            $kode_urut = "00".$urutan;
        }else if($urutan>=10 && $urutan<100){
            $kode_urut = "0".$urutan;
        }else{
            $kode_urut = $urutan;
        }
        $kode_barang = $str_kode_huruf.$kode_urut;


        $new_baju = new baju();
        $new_baju->kode = $kode_barang;
        $new_baju->nama = $nama;
        $new_baju->deskripsi = $deskripsi;
        $new_baju->harga = $harga;
        $new_baju->fk_kategori = $fk_kategori;
        $new_baju->save();

        $last_id = $new_baju->id;

        //upload foto
        foreach($request->file("photo") as $photo){
            $data = new Dfoto();
            $namafile = Str::random(8).".".$photo->getClientOriginalExtension();
            $photo-> move(public_path('public/image/bajus'), $namafile);
            $data->nama_file= $namafile;
            $data->id_baju = (int)$last_id;
            $data->save();
        }

        $message = "New Item Inserted!";

        return redirect()->route('toMasterProducts')->with("message",[
            "isi"=>$message
        ]);

    }

    public function toPromoCode(){

        $list_kode_promo = kode_promo::withTrashed()->get();
        $promo=null;

        return view('admin.masterKodePromo',[
            "title"=>"Master Promo Code",
            "activeMaster"=>"active",
            "activeReports"=>"",
            "activeReviews"=>"",
            "activeProfile"=>"",
            "mode"=>1,
            "promo"=>$promo,
            "promos"=>$list_kode_promo
        ]);

    }


    public function doAddPromoCode(Request $request){

        $id_edit = (int)$request->id_edit;

        $nama = $request->name;
        $besar_potongan = $request->discount;
        $jenis_potongan = $request->discount_type;
        $valid_from = $request->validfrom;
        $valid_until = $request->validuntil;
        $minimum_total = $request->minimum;

        $message= "";

        $validate = $request->validate([
            'name'=>'required',
            'discount'=>'required|numeric|gt:0',
            'discount_type'=>'required',
            'validfrom'=>'required|date|after_or_equal:today',
            'validuntil'=>'required|date|after_or_equal:validfrom',
            'minimum'=>'required|numeric|gt:0'
        ]);


        if($id_edit==-1){
            //insert
            $new_kode_promo = new kode_promo();
            $new_kode_promo->nama = $nama;
            $new_kode_promo->besar_potongan = (int)$besar_potongan;
            $new_kode_promo->jenis_potongan = $jenis_potongan;
            $new_kode_promo->valid_from = $valid_from;
            $new_kode_promo->valid_until = $valid_until;
            $new_kode_promo->minimum_total = (int)$minimum_total;
            $new_kode_promo->save();

            $message = "Promo Code Added!";
        }else{
            //edit
             $promo = kode_promo::where('id',$id_edit)->first();
             $promo->nama = $nama;
             $promo->besar_potongan = (int)$besar_potongan;
             $promo->jenis_potongan = $jenis_potongan;
             $promo->valid_from = $valid_from;
             $promo->valid_until = $valid_until;
             $promo->minimum_total = (int)$minimum_total;
             $promo->save();

             $message = "Promo Edited!";
        }


        return redirect()->route('toPromoCode')->with("message",[
            "isi"=>$message
        ]);
    }

    public function toEditPromo(Request $request){
        $id = $request->id;
        $promo = kode_promo::where('id',$id)->first();

        $list_kode_promo = kode_promo::withTrashed()->get();

        return view('admin.masterKodePromo',[
            "title"=>"Master Promo Code",
            "activeMaster"=>"active",
            "activeReports"=>"",
            "activeReviews"=>"",
            "activeProfile"=>"",
            "mode"=>2,
            "promos"=>$list_kode_promo,
            "promo"=>$promo
        ]);
    }

    public function toProfileAdmin(){

        $current_user = Session::get('current_user');
        $user = User::where('id',$current_user->id)->first();

        return view('admin.profile',[
            "title"=>"Profile",
            "activeMaster"=>"",
            "activeReports"=>"",
            "activeReviews"=>"",
            "activeProfile"=>"active",
            "user"=>$user
        ]);
    }

    public function toManageItem(Request $request){
        $id = $request->id;
        $item = baju::where('id',$id)->first();
        $images = Dfoto::where('id_baju',$id)->get();
        $sizes = size::all();
        $dbaju = d_baju::withTrashed()->where('fk_baju',$id)->get();
        $sizes_dbaju = size::with('sizeBaju')->get();


        return view('admin.manageSizeStok',[
            "title"=>"Manage Sizes and Stocks",
            "activeMaster"=>"active",
            "activeReports"=>"",
            "activeReviews"=>"",
            "activeProfile"=>"",
            "item"=>$item,
            "images"=>$images,
            "sizes"=>$sizes,
            "dbajus"=>$dbaju,
            "sizes_dbaju"=>$sizes_dbaju
        ]);
    }

    public function doAddnewSize(Request $request){
        $size = $request->size;
        $qty = $request->qty;
        $message = "";

        //validation
        $validate = $request->validate([
            'size'=>'required',
            'qty'=>'required|numeric|gt:0'
        ]);

        $id = $request->id_product;

        $size_baju = d_baju::withTrashed()->where('fk_size',$size)->first();


        if(!$size_baju){
            //jika belum ada
            $new_size = new d_baju();
            $new_size->fk_baju = $id;
            $new_size->stok = (int)$qty;
            $new_size->fk_size = $size;
            $new_size->save();

            $message = "Added!";
        }else{
            if($size_baju->trashed()){
                $size_baju->restore();
                $size_baju->stok = $qty;
                $size_baju->save();
                $message = "Restored and Stock Updated!";
            }else{
                $size_baju->stok = $size_baju->stok+$qty;
                $size_baju->save();
                $message = "Stock Updated!";
            }

        }

        return redirect('/admin/toManageItem/'.$id)->with("message",[
            "isi"=>$message
        ]);

    }

    public function doDeleteSizeStock(Request $request){
        $id = $request->id;

        $message = "";

        $dbaju = d_baju::withTrashed()->where('id',$id)->first();
        if($dbaju->trashed()){
            $dbaju->restore();
            $message = "Restored!";
        }else{
            $dbaju->delete();
            $message = "Deleted!";
        }
        return redirect('/admin/toManageItem/'.$dbaju->fk_baju)->with("message",[
            "isi"=>$message
        ]);
    }

    public function doDeleteProduct(Request $request){
        $id = $request->id;

        $message = "";

        $item = baju::withTrashed()->where('id',$id)->first();
        if($item->trashed()){
            $item->restore();
            $message = "Restored!";
        }else{
            $item->delete();
            $message = "Deleted!";
        }

        return redirect()->route('toMasterProducts')->with("message",[
            "isi"=>$message
        ]);

    }

    public function toEditBaju(Request $request){
        $id = $request->id;
        $item = baju::where('id',$id)->first();
        $images = Dfoto::where('id_baju',$id)->get();
        $sizes = size::all();
        $list_categories = kategori::withTrashed()->get();

        return view('admin.editBaju',[
            "title"=>"Manage Sizes and Stocks",
            "activeMaster"=>"active",
            "activeReports"=>"",
            "activeReviews"=>"",
            "activeProfile"=>"",
            "item"=>$item,
            "images"=>$images,
            "sizes"=>$sizes,
            "kategories"=>$list_categories
        ]);
    }

    public function doDeleteFoto(Request $request){
          $id = $request->id; //id dari d_foto_baju
          $img = Dfoto::where('id',$id);
          $id_baju = $img->id_baju;
          $img->forceDelete();

          $message = "Image Deleted!";

          return redirect('/admin/products/edit/'.$id_baju)->with("message",[
            "isi"=>$message
        ]);

    }

    public function doEditBaju(Request $request){
        $id_item = $request->id_item;

        $nama = $request->name;
        $deskripsi = $request->description;
        $harga = $request->price;
        $fk_kategori = $request->category;
        $message = "";

        $validate = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric|gt:0',
            'category'=>'required',
            'photo.*' => 'mimes:png,jpg,jpeg|max:2048',
        ]);

        $old_details = baju::where('id',$id_item)->first();
        $kode_barang = $old_details->kode;

        if($old_details->nama!=$nama){
              //membuat kode
            $list_barang = baju::withTrashed()->get();
            $str_kode_huruf = substr($nama,0,2);
            $str_kode_huruf = strtoupper($str_kode_huruf);

            $urutan = "";
            foreach ($list_barang as $barang) {
            if(strtoupper(substr($barang->kode,0,2))==$str_kode_huruf){
                $urutan = substr($barang->kode,3,2);
            }
            }

            $urutan = (int) $urutan;
            $urutan = $urutan+1;
            $kode_urut = "";

            if($urutan>=0 && $urutan<10){
                $kode_urut = "00".$urutan;
            }else if($urutan>=10 && $urutan<100){
                $kode_urut = "0".$urutan;
            }else{
                $kode_urut = $urutan;
            }
            $kode_barang = $str_kode_huruf.$kode_urut;
        }

        $old_details->nama = $nama;
        $old_details->deskripsi = $deskripsi;
        $old_details->harga = $harga;
        $old_details->fk_kategori = $fk_kategori;
        $old_details->kode = $kode_barang;
        $old_details->save();

        //upload foto
        foreach($request->file("photo") as $photo){
            $data = new Dfoto();
            $namafile = Str::random(8).".".$photo->getClientOriginalExtension();
            $photo-> move(public_path('public/image/bajus'), $namafile);
            $data->nama_file= $namafile;
            $data->id_baju = (int)$id_item;
            $data->save();
        }

        $message = "Item Edited!";

        return redirect('/admin/products/edit/'.$id_item)->with("message",[
            "isi"=>$message
        ]);

    }

    public function doDeleteUser(Request $request){
        $id = $request->id;
        $message = "";

        $user = User::withTrashed()->where('id',$id)->first();
        if($user->trashed()){
            $user->restore();
            $message = "Restored!";
        }else{
            $user->delete();
            $message = "Deleted!";
        }
        return redirect()->route('toMasterUsers')->with("message",[
            "isi"=>$message
        ]);
    }

    public function doLogin(Request $request){

        $username = $request->username;
        $password = $request->password;

        $validate = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $credential = [
            "username" => $username,
            "password" => $password
        ];

        if(Auth::attempt($credential)){
            if(Auth::user()->role=="admin")
            {
                $user = User::where('username',$username)->first();
                Session::put("current_user",$user);
                return redirect('admin/masters/users');
            }
        }
        else
        {
            return redirect('admin/login');
        }
    }

    public function doLogout(Request $request){
        Auth::logout();
        session()->forget('current_user');
        return redirect('admin/login');
    }

    public function doEditProfile(Request $request){
        $username = $request->username;
        $nama = $request->full_name;
        $alamat = $request->alamat;
        $no_telp = $request->phone;
        $email = $request->email;
        $password = $request->password;
        $new_password = $request->newpassword;
        $confirm = $request->confirm;

          //validation
          //edit
          $id_user = Session::get('current_user')->id;
          $user = User::where('id',$id_user)->first();

          $validate = $request->validate([
              'username'=>['required','min:8','regex:/^[a-zA-Z]+$/u','alpha'],
              'full_name'=>'required|max:50',
              'alamat'=>'required|min:12',
              'email'=>'required|email',
              'phone'=>['required','numeric',new CekPanjangTelepon()],
              'password'=>'required'
          ]);

          $users = User::all();
          $username_lama = $user->username;
          $email_lama = $user->email;
          $ada = false;

          if($username_lama!=$username){
              //periksa kembar atau ngga
              foreach ($users as $usr) {
                  if($usr->username==$username){
                      $ada = true;
                      break;
                  }
              }
          }

          if($ada == true){
              $message = "Username has already taken!";
          }else{
              //email check
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
                  if($password==Hash::check($password,$user->password)){
                    if($new_password==""){
                        $user->nama = $nama;
                        $user->username = $username;
                        $user->alamat = $alamat;
                        $user->no_telp = $no_telp;
                        $user->email = $email;
                        $user->save();
                        $message = "User Profile Edited!";
                    }else{
                        if($confirm!=""){
                            if($new_password==$confirm){
                                $user->nama = $nama;
                                $user->username = $username;
                                $user->alamat = $alamat;
                                $user->no_telp = $no_telp;
                                $user->email = $email;
                                $user->password = Hash::make($new_password);
                                $user->save();
                                $message = "User Profile Edited!";
                            }else{
                                $message ="Password and Confirmation Password didn't match!";
                            }
                        }else{
                            $message ="Confirmation Password is Required!";
                        }
                    }
                  }else{
                    $message = "Wrong Password! Failed to Edit!";
                  }
              }else{
                  $message = "Email has already taken!";
              }
          }
          return redirect()->route('toProfileAdmin')->with("message",[
            "isi"=>$message
        ]);
    }

}

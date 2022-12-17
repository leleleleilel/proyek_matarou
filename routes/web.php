<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect('/login');
});
// Route::get('/cetak', [CustomerController::class,"cetak"]);

//login
Route::get('/login', [CustomerController::class,"gotologin"]);
Route::post('/login', [CustomerController::class,"login"])->name('login');
//register
Route::get('/register',[CustomerController::class,"gotoregister"]);
Route::post('/register',[CustomerController::class,"register"]);

//filter
//Route::post('/gantikategori', [CustomerController::class,"gantikategori"]);
//search
//Route::post('/search', [CustomerController::class,"keywordsearch"]);

Route::middleware(['auth', 'verified'])->group(function() {
    // customer
    Route::middleware(['checkRole:customer'])->group(function() {
        Route::get('/home', [CustomerController::class,"home"]);
    });
    Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');
});

//customer:
Route::prefix('customer')->group(function () {
    //cart
    Route::get('/cart',[CustomerController::class,'toCart'])->name('toCart');
    //list produk
    Route::get('/catalogue',[CustomerController::class,'tolistproduct'])->name('toListProduct');
    //perlu id product (DETAIL PRODUCT)
    Route::get('/product/{id}',[CustomerController::class,'toProduct'])->name('toProduct');
    //history
    Route::get('/history',[CustomerController::class,'toHistory'])->name('toHistory');
    //about us
    Route::get('/aboutus',[CustomerController::class,'toAboutUs'])->name('toAboutUs');
});

//admin:
Route::prefix('admin')->group(function () {
    //login admin :
    Route::get('/login',[AdminController::class,'toLoginAdmin'])->name('toLoginAdmin');
    //admin do login :
    Route::post('/doLogin',[AdminController::class,'doLogin']);
    //master users :
    Route::get('/masters/users',[AdminController::class,'toMasterUsers'])->name('toMasterUsers');
    //master categories :
    Route::get('/masters/categories',[AdminController::class,'toMasterCategories'])->name('toMasterCategories');
    //master products:
    Route::get('/masters/products',[AdminController::class,'toMasterProducts'])->name('toMasterProducts');
    //list reviews :
    Route::get('/reviews',[AdminController::class,'toListReviews'])->name('toListReviews');
    //do add category
    Route::post('/doTambahKategori',[AdminController::class,'doTambahKategori']);
    //do add new admin
    Route::post('/doTambahAdmin',[AdminController::class,'doTambahAdmin']);
    //to Edit Category
    Route::get('/edit/category/{id}',[AdminController::class,'toEditKategori']);
    //to edit User
    Route::get('/edit/user/{id}',[AdminController::class,'toEditUsers']);
    //master promo code:
    Route::get('/masters/promos',[AdminController::class,'toPromoCode'])->name('toPromoCode');
    //do add promo code :
    Route::post('/doAddPromoCode',[AdminController::class,'doAddPromoCode']);
    //to profile admin :
    Route::get('/profile',[AdminController::class,'toProfileAdmin'])->name('toProfileAdmin');
    //to edit kode promo admin :
    Route::get('/edit/promo/{id}',[AdminController::class,'toEditPromo']);
    //to delete kategori:
    Route::get('/doDeleteKategori/{id}',[AdminController::class,'doDeleteKategori']);
    //to delete promo :
    Route::get('/doDeletePromo/{id}',[AdminController::class,'doDeletePromo']);
    //do add product :
    Route::post('/doAddProduct',[AdminController::class,'doTambahProduct']);
    //to manage size :
    Route::get('/toManageItem/{id}',[AdminController::class,'toManageItem']);
    //do add new size :
    Route::post('/masters/products/sizes',[AdminController::class,'doAddnewSize']);
    //do delete stock and size :
    Route::get('/doDeleteSizeStock/{id}',[AdminController::class,'doDeleteSizeStock']);
    //do delete product :
    Route::get('/doDeleteProduct/{id}',[AdminController::class,'doDeleteProduct']);
    //to edit product :
    Route::get('/products/edit/{id}',[AdminController::class,'toEditBaju'])->name('toEditBaju');
    //do delete photo on edit :
    Route::get('/doDeleteFoto/{id}/{iditem}',[AdminController::class,'doDeleteFoto']);
    //do edit photo :
    Route::post('/doEditBaju',[AdminController::class,'doEditBaju']);
    //do delete users :
    Route::get('/doDeleteUser/{id}',[AdminController::class,'doDeleteUser']);
    //do logout admin :
    Route::get('/doLogout',[AdminController::class,'doLogout']);
    //do edit profile :
    Route::post('/doEditProfile',[AdminController::class,'doEditProfile']);
    //list history :
    Route::get('/history', [AdminController::class,'gotohistory']);
});

Route::get('/email/verify', function () {
    if (!auth()->user()->hasVerifiedEmail()){
        return view('verify-email');
    }
    else{
        return redirect('/home');
    }
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

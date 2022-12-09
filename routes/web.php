<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
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
//tes123
//456
Route::get('/', function () {
    return redirect('/login');
});

//login
Route::get('/login', [CustomerController::class,"gotologin"]);
Route::post('/login', [CustomerController::class,"login"]);
//register
Route::get('/register',[CustomerController::class,"gotoregister"]);
Route::post('/register',[CustomerController::class,"register"]);

Route::middleware(['auth'])->group(function() {
    // customer
    Route::middleware(['checkRole:customer'])->group(function() {
        Route::get('/home', [CustomerController::class,"home"]);
    });
    Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');
});
//customer:
Route::prefix('customer')->group(function () {

});

//admin:
Route::prefix('admin')->group(function () {
    //login admin :
    Route::get('/login',[AdminController::class,'toLoginAdmin'])->name('toLoginAdmin');
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
    Route::get('/doDeleteFoto/{id}',[AdminController::class,'doDeleteFoto']);
    //do edit photo
    Route::post('/doEditBaju',[AdminController::class,'doEditBaju']);
});




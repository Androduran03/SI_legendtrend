<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardProdukController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PesananController;



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

// Route::get('/', function () {
//     return view('welcome');

// });
Route::get('/',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);
Route::post('/register',[RegisterController::class,'store']);
Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::get('/profil',[RegisterController::class,'profil'])->middleware('auth');
Route::get('/profil/edit/{id}',[RegisterController::class,'edit'])->middleware('auth');
Route::put('/profil/{id}',[RegisterController::class,'update'])->middleware('auth');
Route::put('/resetpassword/{id}',[RegisterController::class,'resetpassword'])->middleware('auth');
Route::resource('/dashboard',DashboardProdukController::class)->middleware('auth');
Route::resource('/stok',StokController::class)->middleware('auth');


Route::resource('/pesanan',PesananController::class)->middleware('auth');
Route::post('/uploadbukti/{id}',[PesananController::class,'uploadbukti'])->middleware('auth');


Route::resource('/admin',AdminController::class)->middleware('admin');
Route::get('/pesananbaru',[AdminController::class,'pesananbaru'])->middleware('admin');
Route::get('/editstatus/{id}',[AdminController::class,'editstatus'])->middleware('admin');
Route::put('/updatestatus/{id}',[AdminController::class,'updatestatus'])->middleware('admin');
Route::get('/laporan',[AdminController::class,'laporan'])->middleware('admin');
Route::get('/cetaklaporan',[AdminController::class,'cetaklaporan'])->middleware('admin');
Route::get('/cari',[AdminController::class,'cari'])->middleware('admin');
Route::get('/admin/{id}/delete',[AdminController::class,'destroy'])->middleware('admin');
Route::resource('/stokdistributor',StokdistributorController::class)->middleware('admin');

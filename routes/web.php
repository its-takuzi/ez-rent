<?php

use App\Http\Controllers\admincontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginregistercontroller;
use App\Http\Controllers\mobilcontroller;
use App\Http\Controllers\pemesanancontroller;
use App\Http\Controllers\profilcontroller;
use App\Http\Controllers\rentalcontroller;
use App\Http\Controllers\usercontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/daftar/login');
});
Route::resource('/rental', \App\Http\Controllers\rentalcontroller::class);
Route::resource('/mobil', \App\Http\Controllers\mobilcontroller::class);
Route::resource('/profil', \App\Http\Controllers\profilcontroller::class);

//login dan register
Route::get('/login', [loginregistercontroller::class, 'login'])->name('login');
Route::post('/postlogin', [loginregistercontroller::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [loginregistercontroller::class, 'logout'])->name('logout');

Route::get('/register', [loginregistercontroller::class, 'register'])->name('register');
Route::post('/postr', [loginregistercontroller::class, 'postr'])->name('postr');

//admin
Route::get('/regisa', [admincontroller::class, 'regisa'])->name('regisa');
Route::get('/hadmin', [admincontroller::class, 'hadmin'])->name('hadmin');
Route::post('/posta', [admincontroller::class, 'posta'])->name('posta');
Route::post('/hapususer/{id}', [admincontroller::class, 'hapususer'])->name('hapususer');

//rentaladmin
Route::get('/rhome', [admincontroller::class, 'rhome'])->name('rhome');
Route::get('rshow/{id}', [admincontroller::class, 'rshow'])->name('rshow');
Route::get('/radmin/pesanan/{id}', [admincontroller::class, 'pesanan'])->name('pesanan');
Route::post('/terima/{id}', [admincontroller::class, 'terima'])->name('terima');
Route::post('/tolak/{id}', [admincontroller::class, 'tolak'])->name('tolak');
Route::post('/hapus/{id}', [admincontroller::class, 'hapus'])->name('hapus');
Route::post('/cod/{id}', [admincontroller::class, 'cod'])->name('cod');
Route::post('/transfer/{id}', [admincontroller::class, 'transfer'])->name('transfer');
Route::post('/hitung-jumlah-hari', [admincontroller::class, 'hitungJumlahHari'])->name('hitung.jumlah.hari');
Route::get('/mobil/create/{rental_id}', [mobilcontroller::class, 'create'])->name('mobil.create');

//user 
Route::get('/ushow/show/{id}', [usercontroller::class, 'ushow'])->name('ushow');
Route::get('/rental/pemesanan/{rental_id}/{mobil}', [pemesanancontroller::class, 'pemesanan'])->name('pemesanan');
Route::post('/storep', [pemesanancontroller::class, 'storep'])->name('storep');
Route::get('/rental/cekpemesanan/{id}', [pemesanancontroller::class, 'showpemesanan'])->name('showpemesanan');
Route::post('/deletep/{id}', [pemesanancontroller::class, 'deletep'])->name('deletep');



    //implementasi middleware
    /* Route::group(['middleware' => ['auth', 'checklevel:admin']], function () {
    Route::get('/regisa', [admincontroller::class, 'regisa'])->name('regisa');
    Route::get('/hadmin', [admincontroller::class, 'hadmin'])->name('hadmin');
    Route::post('/hapususer/{id}', [admincontroller::class, 'hapususer'])->name('hapususer');
    Route::resource('/rental', \App\Http\Controllers\rentalcontroller::class);
    Route::resource('/mobil', \App\Http\Controllers\mobilcontroller::class);
    Route::resource('/profil', \App\Http\Controllers\profilcontroller::class);
}); */

    /* Route::group(['middleware' => ['auth', 'checklevel:user']], function () {
    Route::get('/ushow/show/{id}', [usercontroller::class, 'ushow'])->name('ushow');
    Route::get('/rental/pemesanan/{rental_id}/{mobil}', [pemesanancontroller::class, 'pemesanan'])->name('pemesanan');
    Route::post('/storep', [pemesanancontroller::class, 'storep'])->name('storep');
    Route::get('/rental/cekpemesanan/{id}', [pemesanancontroller::class, 'showpemesanan'])->name('showpemesanan');
    Route::post('/deletep/{id}', [pemesanancontroller::class, 'deletep'])->name('deletep');
    Route::resource('/rental', \App\Http\Controllers\rentalcontroller::class);
    Route::resource('/mobil', \App\Http\Controllers\mobilcontroller::class);
    Route::resource('/profil', \App\Http\Controllers\profilcontroller::class);
}) */;

/* Route::group(['middleware' => ['auth', 'checklevel:admin_rental']], function () {
    Route::get('/rhome', [admincontroller::class, 'rhome'])->name('rhome');
    Route::get('rshow/{id}', [admincontroller::class, 'rshow'])->name('rshow');
    Route::get('/radmin/pesanan/{id}', [admincontroller::class, 'pesanan'])->name('pesanan');
    Route::post('/terima/{id}', [admincontroller::class, 'terima'])->name('terima');
    Route::post('/tolak/{id}', [admincontroller::class, 'tolak'])->name('tolak');
    Route::post('/hapus/{id}', [admincontroller::class, 'hapus'])->name('hapus');
    Route::resource('/rental', \App\Http\Controllers\rentalcontroller::class);
    Route::resource('/mobil', \App\Http\Controllers\mobilcontroller::class);
    Route::resource('/profil', \App\Http\Controllers\profilcontroller::class);
}); */
/* 
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    // Your admin routes here
    Route::get('/regisa', [admincontroller::class, 'regisa'])->name('regisa');
    Route::get('/hadmin', [admincontroller::class, 'hadmin'])->name('hadmin');
    Route::post('/hapususer/{id}', [admincontroller::class, 'hapususer'])->name('hapususer');
    Route::resource('/rental', \App\Http\Controllers\rentalcontroller::class);
    Route::resource('/mobil', \App\Http\Controllers\mobilcontroller::class);
    Route::resource('/profil', \App\Http\Controllers\profilcontroller::class);
});

Route::group(['middleware' => ['auth', 'role:admin_rental']], function () {
    // Your admin_rental routes here
    Route::get('/rhome', [admincontroller::class, 'rhome'])->name('rhome');
    Route::get('rshow/{id}', [admincontroller::class, 'rshow'])->name('rshow');
    Route::get('/radmin/pesanan/{id}', [admincontroller::class, 'pesanan'])->name('pesanan');
    Route::post('/terima/{id}', [admincontroller::class, 'terima'])->name('terima');
    Route::post('/tolak/{id}', [admincontroller::class, 'tolak'])->name('tolak');
    Route::post('/hapus/{id}', [admincontroller::class, 'hapus'])->name('hapus');
    Route::resource('/rental', \App\Http\Controllers\rentalcontroller::class);
    Route::resource('/mobil', \App\Http\Controllers\mobilcontroller::class);
    Route::resource('/profil', \App\Http\Controllers\profilcontroller::class);
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    // Your user routes here
    Route::get('/ushow/show/{id}', [usercontroller::class, 'ushow'])->name('ushow');
    Route::get('/rental/pemesanan/{rental_id}/{mobil}', [pemesanancontroller::class, 'pemesanan'])->name('pemesanan');
    Route::post('/storep', [pemesanancontroller::class, 'storep'])->name('storep');
    Route::get('/rental/cekpemesanan/{id}', [pemesanancontroller::class, 'showpemesanan'])->name('showpemesanan');
    Route::post('/deletep/{id}', [pemesanancontroller::class, 'deletep'])->name('deletep');
    Route::resource('/rental', \App\Http\Controllers\rentalcontroller::class);
    Route::resource('/mobil', \App\Http\Controllers\mobilcontroller::class);
    Route::resource('/profil', \App\Http\Controllers\profilcontroller::class);
});
 */
<?php

use App\Http\Controllers\Api\loginregistercontroller;
use App\Http\Controllers\Api\pesanan;
use App\Http\Controllers\pemesanancontroller;
use App\Models\pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('/loginapi', [loginregistercontroller::class, 'login']);
Route::post('/registerapi', [loginregistercontroller::class, 'register']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logoutapi', [loginregistercontroller::class, 'logout']);
    Route::apiResource('/rentalapi', \App\Http\Controllers\Api\rentalcontroller::class);
    Route::get('/cekpesanan/{id}', [pesanan::class, 'cekpesanan']);
    Route::delete('/hapus/{id}', [pesanan::class, 'hapuspesanan']);
});

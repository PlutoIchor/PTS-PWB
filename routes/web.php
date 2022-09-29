<?php

use App\Http\Controllers\ATMController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cek_saldo', [ATMController::class, 'cek_saldo']);
Route::get('/tarik_tunai', [ATMController::class, 'tarik_tunai']);
Route::get('/pembayaran', [ATMController::class, 'pembayaran']);
Route::get('/transfer', [ATMController::class, 'transfer']);
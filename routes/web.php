<?php

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
    return view('home');
})->name('home');

Route::get('/create-cash-transaction', function () {
    return view('create-cash-transaction');
})->name('create-cash-transaction');

Route::get('/create-card-transaction', function () {
    return view('create-card-transaction');
})->name('create-card-transaction');

Route::get('/create-bank-transaction', function () {
    return view('create-bank-transaction');
})->name('create-bank-transaction');

Route::post('create-cash-transaction',
    [\App\Http\Controllers\TransactionController::class, 'createCashTransaction']);
Route::post('create-card-transaction',
    [\App\Http\Controllers\TransactionController::class, 'createCardTransaction']);
Route::post('create-bank-transaction',
    [\App\Http\Controllers\TransactionController::class, 'createBankTransaction']);

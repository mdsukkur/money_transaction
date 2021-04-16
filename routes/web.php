<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ChangePasswordController;

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

Route::group(['middleware' => ['auth', 'verified']], function () {
    /*================================== User Dashboard ==================================*/
    Route::view('dashboard', 'frontend.pages.dashboard.index')->name('user.dashboard');

    /*================================== User ==================================*/
    Route::post('profile', [UserController::class, 'profileUpdate'])->name('user.profile.request');
    Route::post('change-password', [ChangePasswordController::class, 'changePassword'])->name('user.password.update');
    Route::view('profile', 'frontend.pages.profile.index')->name('user.profile');

    /*================================== Deposit ==================================*/
    Route::view('deposit', 'frontend.pages.deposit.index')->name('user.deposit');

    /*================================== Withdraw ==================================*/
    Route::view('withdraw', 'frontend.pages.withdraw.index')->name('user.withdraw');

    /*================================== Transfer ==================================*/
    Route::view('transfer', 'frontend.pages.transfer.index')->name('user.transfer');

    /*================================== Transactions ==================================*/
    Route::view('transactions', 'frontend.pages.transactions.index')->name('user.transactions');
});

require __DIR__ . '/auth.php';

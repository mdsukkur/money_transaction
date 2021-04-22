<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ChangePasswordController;
use App\Http\Controllers\User\BankInformation\BankInformationController;
use App\Http\Controllers\Deposit\DepositController;
use App\Http\Controllers\Withdraw\WithdrawController;
use App\Http\Controllers\Transfer\TransferController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    /*================================== User Dashboard ==================================*/
    Route::view('dashboard', 'frontend.pages.dashboard.index')->name('user.dashboard');

    /*================================== User ==================================*/
    Route::get('profile', [UserController::class, 'profilePage'])->name('user.profile');
    Route::get('edit-profile', [UserController::class, 'editProfilePage'])->name('user.edit.profile');
    Route::post('profile', [UserController::class, 'profileUpdate'])->name('user.profile.request');

    /*================================== Change Password ==================================*/
    Route::get('change-password', [ChangePasswordController::class, 'index'])->name('user.password');
    Route::post('change-password', [ChangePasswordController::class, 'updatePassword'])->name('user.password.update');

    /*================================== User ==================================*/
    Route::resource('bankinfo', BankInformationController::class)->only(['store', 'show', 'destroy']);

    /*================================== Deposit ==================================*/
    Route::resource('deposit', DepositController::class)->only(['index', 'store']);

    /*================================== Withdraw ==================================*/
    Route::resource('withdraw', WithdrawController::class)->only(['index', 'store']);

    /*================================== Transfer ==================================*/
    Route::resource('transfer', TransferController::class)->only(['index', 'store']);

    /*================================== Transactions ==================================*/
    Route::view('transactions', 'frontend.pages.transactions.index')->name('user.transactions');
});

require __DIR__ . '/auth.php';

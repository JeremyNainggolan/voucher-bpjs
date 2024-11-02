<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\VoucherController;

Route::resource('vouchers', VoucherController::class);

Route::get('/bill', [BillController::class, 'index'])->name('bill')->middleware('auth');
Route::post('/bill/{bill}/pay', [BillController::class, 'pay'])->name('bill.pay')->middleware('auth');
Route::get('/user/bill', [BillController::class, 'showBill']);

Route::prefix('user')->group(function(){

    Route::get('/', [UserController::class, 'index']);
    Route::get('dashboard', [UserController::class, 'index']);
    Route::get('bill', [UserController::class, 'bill']);
    Route::get('my-voucher', [UserController::class, 'my_voucher']);
    Route::get('bill-konfirmasi/{id}', [UserController::class, 'bill_konfirmasi']);

});

Route::prefix('admin')->group(function(){

    Route::get('/', [AdminController::class, 'index']);
    Route::get('generate_voucher', [AdminController::class, 'generate_voucher']);

});

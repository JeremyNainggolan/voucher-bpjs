<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;

Route::get('/bill', [BillController::class, 'index'])->name('bill')->middleware('auth');
Route::post('/bill/{bill}/pay', [BillController::class, 'pay'])->name('bill.pay')->middleware('auth');
Route::get('/user/bill', [BillController::class, 'showBill']);
Route::prefix('user')->group(function(){

    Route::get('/', [UserController::class, 'index']);
    Route::get('dashboard', [UserController::class, 'index']);
    Route::get('bill', [UserController::class, 'bill']);
    Route::get('my-voucher', [UserController::class, 'my_voucher']);

});

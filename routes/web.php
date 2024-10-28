<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function(){

    Route::get('/', [UserController::class, 'index']);
    Route::get('dashboard', [UserController::class, 'index']);
    Route::get('bill', [UserController::class, 'bill']);
    Route::get('my-voucher', [UserController::class, 'my_voucher']);

});

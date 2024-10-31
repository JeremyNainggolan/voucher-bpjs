<?php

// app/Http/Controllers/BillController.php
namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $bill = Bill::where('user_id', $user->id)->latest()->first();

        return view('bill', [
            'data' => [
                'page_title' => 'Tagihan BPJS',
            ],
            'bill' => $bill,
        ]);
    }

    public function showBill()
    {
        $bill = Bill::where('user_id', auth()->id())->first();
        return view('user.bill', compact('bill'));
    }

    public function pay(Bill $bill)
    {
        $bill->update(['status' => 'Sudah Dibayar']);
        return redirect()->route('bill')->with('success', 'Pembayaran berhasil');
    }
}
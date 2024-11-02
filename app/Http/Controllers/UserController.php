<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'JKN - Web';
        return view('user.index', compact('data'));
    }

    public function bill() {
        $data['page_title'] = 'Bill';
        $data['bills'] = Bill::all()->toArray();
        return view('user.bill', compact('data'));
    }

    public function my_voucher() {
        $data['page_title'] = 'My Voucher';
        return view('user.my-voucher', compact('data'));
    }

    public function bill_konfirmasi($id)
    {
        $data['page_title'] = 'Konfirmasi Pembayaran';
        $data['bills'] = Bill::all()->where('id', $id)->toArray();
        return view('user.bill-konfirmasi', compact('data'));
    }


}

<?php

namespace App\Http\Controllers;

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
        return view('user.bill', compact('data'));
    }

    public function my_voucher() {
        $data['page_title'] = 'My Voucher';
        return view('user.my-voucher', compact('data'));
    }


}

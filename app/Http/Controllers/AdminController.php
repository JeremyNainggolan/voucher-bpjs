<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Admin';
        $data['vouchers'] = Voucher::all()->toArray();
        return view('admin.index', compact('data'));
    }

    public function generate_voucher() {
        $data['page_title'] = 'Generate Voucher';
        return view('admin.generate-voucher', compact('data'));
    }


}

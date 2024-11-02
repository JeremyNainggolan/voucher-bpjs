<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'JKN - Web';
        return view('user.index', compact('data'));
    }

    public function bill()
    {
        $data['page_title'] = 'Bill';
        $data['bills'] = Bill::all()->toArray();
        return view('user.bill', compact('data'));
    }

    public function my_voucher()
    {
        $data['page_title'] = 'My Voucher';
        $data['my_vouchers'] = DB::table('bills')
            ->join('vouchers', 'bills.nik', '=', 'vouchers.diklaim_oleh')
            ->get();
        return view('user.my-voucher', compact('data'));
    }

    public function bill_konfirmasi($nik)
    {
        $data['page_title'] = 'Konfirmasi Pembayaran';
        $data['bills'] = DB::table('bills')
            ->leftJoin('vouchers', 'bills.nik', '=', 'vouchers.diklaim_oleh')
            ->where('bills.nik', $nik)->get();

        return view('user.bill-konfirmasi', compact('data'));
    }

    public function post_bill(Request $request)
    {

    }

    public function post_voucher(Request $request)
    {
        $request->validate([
            'voucher' => 'required',
        ]);

        $voucher = DB::table('vouchers')->where('kode_voucher', $request->voucher)->first();

        if ($voucher) {
            $voucher_update = DB::table('vouchers')->where('kode_voucher', $request->voucher)->update(['diklaim_oleh' => '1234567890123456']);
            if ($voucher_update) {
                return redirect('user/my-voucher')->with('success', 'Voucher berhasil dikonfirmasi');
            }
        }
        return redirect('user/my-voucher')->with('error', 'Voucher tidak ditemukan');
    }

}

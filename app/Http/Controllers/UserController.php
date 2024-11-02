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
        $data['my_vouchers'] = DB::table('users')
            ->join('vouchers', 'users.voucher', '=', 'vouchers.kode_voucher')
            ->select('users.*', 'vouchers.jumlah_voucher')
            ->get();
        return view('user.my-voucher', compact('data'));
    }

    public function bill_konfirmasi($id)
    {
        $data['page_title'] = 'Konfirmasi Pembayaran';
        $exist = DB::table('bills')
            ->join('users', 'bills.user_id', '=', 'users.id')
            ->join('vouchers', 'users.voucher', '=', 'vouchers.kode_voucher')
            ->where('bills.user_id', $id)->get();
        
        if ($exist->isEmpty()) {
            $data['bills'] = DB::table('bills')
                ->join('users', 'bills.user_id', '=', 'users.id')
                ->select('bills.*', 'users.name', 'users.email', 'users.voucher', 'users.voucher_name')
                ->where('bills.user_id', $id)->get();
        } else {
            $data['bills'] = DB::table('bills')
                ->join('users', 'bills.user_id', '=', 'users.id')
                ->join('vouchers', 'users.voucher', '=', 'vouchers.kode_voucher')
                ->select('bills.*', 'users.name', 'users.email', 'users.voucher', 'users.voucher_name', 'vouchers.jumlah_voucher')
                ->where('bills.user_id', $id)->get();
        }
        return view('user.bill-konfirmasi', compact('data'));
    }

    public function post_voucher(Request $request)
    {
        $request->validate([
            'voucher' => 'required',
        ]);

        $voucher = DB::table('vouchers')->where('kode_voucher', $request->voucher)->first();

        if (DB::table('vouchers')->where('kode_voucher', $voucher->kode_voucher)->exists()) {
            $user_add = DB::table('users')->update(['voucher' => $voucher->kode_voucher, 'voucher_name' => $voucher->nama_voucher]);
            if ($user_add) {
                return redirect('user/my-voucher')->with('success', 'Voucher berhasil dikonfirmasi');
            }
        }
        return redirect('user/my-voucher')->with('error', 'Voucher tidak ditemukan');
    }

}

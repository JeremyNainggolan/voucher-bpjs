<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'JKN - Web';
        return view('user.index', compact('data'));
    }

    public function login()
    {
        $data['page_title'] = 'Login';
        return view('user.login', compact('data'));
    }

    public function post_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(url('user'));
        }

        return redirect(url('user/login'))->with('error', 'Username or Password is Invalid');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect(url('user/login'));
    }

    public function bill()
    {
        $data['page_title'] = 'Bill';
        $data['bills'] = DB::table('bills')->where('nik', Auth::user()->NIK)->get();
        return view('user.bill', compact('data'));
    }

    public function my_voucher()
    {
        $data['page_title'] = 'My Voucher';
        $data['my_vouchers'] = DB::table('vouchers')
            ->where('diklaim_oleh', Auth::user()->NIK)
            ->get();
        return view('user.my-voucher', compact('data'));
    }

    public function bill_konfirmasi()
    {
        $data['page_title'] = 'Konfirmasi Pembayaran';
        $data['vouchers'] = DB::table('vouchers')->where('diklaim_oleh', Auth::user()->NIK)->get();
        $data['bills'] = DB::table('bills')->where('bills.nik', Auth::user()->NIK)->get();

        return view('user.bill-konfirmasi', compact('data'));
    }

    public function post_bill(Request $request)
    {
        $request->validate([
            'kode_voucher' => 'required',
            'bill_id' => 'required',
        ]);

        $bill = DB::table('bills')
            ->where('id', (int)$request->bill_id)
            ->update(['status' => 'Sudah Dibayar']);

        $voucher = DB::table('vouchers')->where('kode_voucher', $request->kode_voucher)->delete();

        if (DB::table('bills')->where('id', (int)$request->bill_id)->update(['status' => 'Sudah Dibayar']) && DB::table('vouchers')->where('kode_voucher', $request->kode_voucher)->delete()) {
            return redirect('user/bill-konfirmasi')->with('error', 'Bill gagal dikonfirmasi');
        }
        return redirect('user/bill')->with('success', 'Bill berhasil dikonfirmasi');
    }

    // public function post_bill(Request $request)
    // {
    //     $request->validate([
    //         'voucher' => 'required',
    //         'bill' => 'required',
    //     ]);

    //     $bill = DB::table('bills')
    //         ->where('amount', '=', $request->bill)
    //         ->where('nik', '=', Auth::user()->NIK)
    //         ->first();

    //     $voucher = DB::table('vouchers')
    //         ->where('kode_voucher', '=', $request->voucher)
    //         ->where('diklaim_oleh', '=', Auth::user()->NIK)
    //         ->first();

    //     if ($bill && $voucher) {
    //         $bill_update = DB::table('bills')->where('id', $request->bill)->update(['status' => 'Sudah Dibayar']);
    //         if ($bill_update) {
    //             return redirect('user/bill-konfirmasi')->with('success', 'Bill berhasil dikonfirmasi');
    //         }
    //     }
    //     return redirect('user/bill-konfirmasi')->with('error', 'Bill gagal dikonfirmasi');
    // }

    public function post_voucher(Request $request)
    {
        $request->validate([
            'voucher' => 'required',
        ]);

        $voucher = DB::table('vouchers')
            ->where('kode_voucher', '=', $request->voucher)
            ->whereNull('diklaim_oleh')
            ->first();


        if ($voucher) {
            $voucher_update = DB::table('vouchers')->where('kode_voucher', $request->voucher)->update(['diklaim_oleh' => Auth::user()->NIK]);
            if ($voucher_update) {
                return redirect('user/my-voucher')->with('success', 'Voucher berhasil dikonfirmasi');
            }
        }
        return redirect('user/my-voucher')->with('error', 'Kode Voucher Tidak Gacor');
    }

}

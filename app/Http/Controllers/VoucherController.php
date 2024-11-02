<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VoucherController extends Controller
{
    // public function index()
    // {
    //     $vouchers = Voucher::all();
    //     return view('admin.index', compact('vouchers'));
    // }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_voucher' => 'required|string|max:255',
            'jumlah_voucher' => 'required|integer',
            'expired_date' => 'required|date',
        ]);

        // Generate random voucher code
        $kode_voucher = Str::random(10);

        Voucher::create([
            'nama_voucher' => $request->nama_voucher,
            'kode_voucher' => $kode_voucher,
            'jumlah_voucher' => $request->jumlah_voucher,
            'expired_date' => $request->expired_date,
        ]);

        return redirect('admin/')->with('success', 'Voucher created successfully.');
    }

    public function index()
    {
        $vouchers = Voucher::all(); // Mengambil semua data voucher dari database
        return view('vouchers.index', compact('vouchers')); // Mengirimkan data ke view
    }

}

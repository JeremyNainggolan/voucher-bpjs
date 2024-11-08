<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_voucher',
        'kode_voucher',
        'jumlah_voucher',
        'diklaim_oleh',
        'expired_date',
    ];
}
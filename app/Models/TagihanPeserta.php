<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanPeserta extends Model
{
    use HasFactory;

    protected $table = 'tagihan_peserta';

    protected $fillable = ['peserta_bpjs_id', 'pembayaran', 'channel', 'tanggal_jatuh_tempo', 'status'];

    public function pesertaBpjs()
    {
        return $this->belongsTo(PesertaBpjs::class);
    }
}
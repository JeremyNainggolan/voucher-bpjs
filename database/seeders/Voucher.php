<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Voucher extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Voucher::create([
            'nama_voucher' => 'Sosialisasi',
            'kode_voucher'=> 'VOUCHERGACOR',
            'jumlah_voucher' => '15000',
            'expired_date' => '2024-10-31',
        ]);

        Voucher::create([
            'nama_voucher' => 'Donor Darah',
            'kode_voucher'=> 'SEMOGABERKAH',
            'jumlah_voucher' => '20000',
            'expired_date' => '2024-10-31',
        ]);

        Voucher::create([
            'nama_voucher' => 'Donor Plasma',
            'kode_voucher'=> 'SEHATSELALU',
            'jumlah_voucher' => '25000',
            'expired_date' => '2024-10-31',
        ]);
    }
}
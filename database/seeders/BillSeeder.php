<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bill;
use App\Models\User;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            Bill::create([
                'user_id' => $user->id,
                'nama' => $user->name,
                'nik' => $user->NIK,
                'pembayaran' => rand(50000, 200000),
                'channel' => ['Bank Transfer', 'E-wallet', 'Minimarket'][rand(0, 2)],
                'tanggal_jatuh_tempo' => now()->addDays(rand(1, 30)),
                'status' => ['Belum Dibayar', 'Sudah Dibayar'][rand(0, 1)],
            ]);
        }
    }
}
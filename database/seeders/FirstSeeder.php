<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pembayaran;
use App\Models\PenarikanUang;
use App\Models\Rekening;
use App\Models\Transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'no_telp' => '081563832997',
            'nama' => "Dimas",
            'pin' => bcrypt('pin')
        ]);

        User::create([
            'no_telp' => '081563832998',
            'nama' => "Jaki",
            'pin' => bcrypt('pin')
        ]);

        Rekening::create([
            'id_user' => 1,
            'nominal'=> 100000000,
        ]);

        Transaksi::create([
            'id_pengirim' => 1,
            'id_penerima' => 2,
            'nominal' => 500000
        ]);

        PenarikanUang::create([
            'id_user' => 1,
            'nominal' => 100000
        ]);

        Pembayaran::create([
            'jenis_pembayaran' => 'Pulsa',
            'id_user' => 1
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pesanans')->insert([
            [
                'kode_pesanan' => 'P-001',
                'mobil_id' => 1,
                'waktu_pengambilan' => '00:00',
                'tanggal_rental_mulai' => '2023-06-3',
                'tanggal_rental_selesai' => '2023-06-5',
                'user_id' => 1,
            ],
            [
                'kode_pesanan' => 'P-002',
                'mobil_id' => 1,
                'waktu_pengambilan' => '01:00',
                'tanggal_rental_mulai' => '2023-06-1',
                'tanggal_rental_selesai' => '2023-06-2',
                'user_id' => 1,
            ]
            ]);
    }
}

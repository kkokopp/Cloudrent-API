<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // \App\Models\Mobil_Spek::factory()->create([[
        //     'mobil_id' => 1,
        //     'spek_id' => 2
        // ],[
        //     'mobil_id' => 1,
        //     'spek_id' => 3
        // ],[
        //     'mobil_id' => 1,
        //     'spek_id' => 1
        // ],[
        //     'mobil_id' => 2,
        //     'spek_id' => 2
        // ],[
        //     'mobil_id' => 2,
        //     'spek_id' => 1
        // ]]);

        DB::table('statuses')->insert([[
            'name' => 'Lunas',
        ],[
            'name' => 'Belum Lunas',
        ]]);

        DB::table('speks')->insert([[
            'nama' => 'mesin',
            'isi' => '12000c',
        ], 
        
        [
            'nama' => 'bahan bakar',
            'isi' => 'bensisn',
        ], 
        [
            'nama' => 'seat',
            'isi' => '5',
        ],
        [
            'nama' => 'tansmisi',
            'isi' => 'otomatis',
        ]]);

        DB::table('pesanan_statuses')->insert([[
            'name' => 'Menuggu Konfirmasi',
        ],[
            'name' => 'Menuggu Pembayaran',
        ],
        [
            'name' => 'Menunggu Penjemputan',
        ],
        [
            'name' => 'Selesai',
        ]]);

        DB::table('mobils')->insert([[
            'nama' => 'Avanza',
            'brand' => 'daihatsu',
            'kode_mobil' => 'M-001',
            'harga' => '500.000',
            'mesin' => '1200cc',
            'bahan_bakar' => 'bensin',
            'transmisi' => 'otomatis',
            'seat' => '5'
        ],
        [
            'nama' => 'Pakero',
            'brand' => 'daihatsu',
            'kode_mobil' => 'M-002',
            'harga' => '600.000',
            'mesin' => '1200cc',
            'bahan_bakar' => 'bensin',
            'transmisi' => 'otomatis',
            'seat' => '5'
        ],
        [
            'nama' => 'Fortuner',
            'brand' => 'daihatsu',
            'kode_mobil' => 'M-003',
            'harga' => '700.000',
            'mesin' => '1200cc',
            'bahan_bakar' => 'bensin',
            'transmisi' => 'otomatis',
            'seat' => '5'
        ]]);

        DB::table('mobil_spek')->insert([[
            'mobil_id' => 1,
            'spek_id' => 2
        ],[
            'mobil_id' => 1,
            'spek_id' => 3
        ],[
            'mobil_id' => 1,
            'spek_id' => 1
        ],[
            'mobil_id' => 2,
            'spek_id' => 2
        ],[
            'mobil_id' => 2,
            'spek_id' => 1
        ]]);

        DB::table('pesanans')->insert([
            [
                'kode_pesanan' => 'P-001',
                'nama_pemesan' => 'Kopriyanto',
                'email_pemesan' => 'kopriyan003@gmail.com',
                'no_hp' => '+6287717932289',
                'mobil_id' => 1,
                'waktu_pengambilan' => '00:00',
                'tanggal_rental_mulai' => '2023-06-3',
                'tanggal_rental_selesai' => '2023-06-5',
                'status_id' => 1, 
                'total' => '500.000', 
                'user_id' => 1,
            ],
            [
                'kode_pesanan' => 'P-002',
                'nama_pemesan' => 'Kopriyanto',
                'email_pemesan' => 'kopriyan003@gmail.com',
                'no_hp' => '+6287717932289',
                'mobil_id' => 1,
                'waktu_pengambilan' => '01:00',
                'tanggal_rental_mulai' => '2023-06-1',
                'tanggal_rental_selesai' => '2023-06-2',
                'status_id' => 2,
                'total' => '500.000',
                'user_id' => 1,
            ]
            ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('mobils')->insert([[
            'nama' => 'Avanza',
            'brand' => 'daihatsu',
            'harga' => '500.000',
            'mesin' => '1200cc',
            'bahan_bakar' => 'bensin',
            'transmisi' => 'otomatis',
            'seat' => '5'
        ],
        [
            'nama' => 'Pakero',
            'brand' => 'daihatsu',
            'harga' => '600.000',
            'mesin' => '1200cc',
            'bahan_bakar' => 'bensin',
            'transmisi' => 'otomatis',
            'seat' => '5'
        ],
        [
            'nama' => 'Fortuner',
            'brand' => 'daihatsu',
            'harga' => '700.000',
            'mesin' => '1200cc',
            'bahan_bakar' => 'bensin',
            'transmisi' => 'otomatis',
            'seat' => '5'
        ]]);
    }
}

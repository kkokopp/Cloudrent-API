<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
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
    }
}

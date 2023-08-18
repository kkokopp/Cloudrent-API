<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Mobil_SpekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
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
    }
}

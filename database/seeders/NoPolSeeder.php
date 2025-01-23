<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoPolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('no_pol')->insert(
            ['plat_no' => 'B 1234 ABC'],
            ['plat_no' => 'B 5678 DEF'],
            ['plat_no' => 'B 9101 GHI'],
        );
    }
}

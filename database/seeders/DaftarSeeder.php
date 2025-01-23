<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('daftar')->insert([
            ['nama' => 'John Doe', 'posisi' => 'keamanan'],
            ['nama' => 'Jane Smith', 'posisi' => 'gudang'],
            ['nama' => 'Alice Johnson', 'posisi' => 'driver'],
            ['nama' => 'Bob Brown', 'posisi' => 'forklift'],
        ]);
    }
}

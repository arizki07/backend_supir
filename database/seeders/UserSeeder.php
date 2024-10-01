<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'username' => 'Admin',
                'password' => bcrypt('lla'),
                'role' => 'super',
                'status' => 'active',
            ],
            [
                'name' => 'Alvin Tanuwijaya',
                'username' => 'alvin',
                'password' => bcrypt('126912'),
                'role' => 'super',
                'status' => 'active',
            ],
            [
                'name' => 'Tri Endah',
                'username' => 'endah',
                'password' => bcrypt('321'),
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'name' => 'Rosa Pradewi',
                'username' => 'rosa',
                'password' => bcrypt('123'),
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'name' => 'Heri Mulyana',
                'username' => 'heri',
                'password' => bcrypt('mulyana'),
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'name' => 'Andri Tria H',
                'username' => 'andri',
                'password' => bcrypt('tria'),
                'role' => 'supir',
                'status' => 'active',
            ],
            [
                'name' => 'Fahmi Fahrurozi',
                'username' => 'fahmi',
                'password' => bcrypt('123'),
                'role' => 'gudang',
                'status' => 'active',
            ],
            [
                'name' => 'Hardiman',
                'username' => 'hardiman',
                'password' => bcrypt('456'),
                'role' => 'security',
                'status' => 'active',
            ],
            [
                'name' => 'Maulana',
                'username' => 'maulana',
                'password' => bcrypt('456'),
                'role' => 'security',
                'status' => 'active',
            ],
            [
                'name' => 'Arief',
                'username' => 'arief',
                'password' => bcrypt('456'),
                'role' => 'security',
                'status' => 'active',
            ],
            [
                'name' => 'Aryudi',
                'username' => 'aryudi',
                'password' => bcrypt('789'),
                'role' => 'security',
                'status' => 'active',
            ],
            [
                'name' => 'Nurokhman',
                'username' => 'nurokhman',
                'password' => bcrypt('789'),
                'role' => 'security',
                'status' => 'active',
            ],
            [
                'name' => 'Agus Sutisna',
                'username' => 'aguss',
                'password' => bcrypt('147'),
                'role' => 'security',
                'status' => 'active',
            ],
            [
                'name' => 'Kadi',
                'username' => 'kadi',
                'password' => bcrypt('147'),
                'role' => 'security',
                'status' => 'active',
            ],
        ];

        foreach ($users as $us) {
            User::create($us);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Pengguna',
                'email' => 'pengguna@gmail.com',
                'role' => 'user',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Admin',
                'email' => 'Admin@gmail.com',
                'role' => 'sm',
                'password' => bcrypt('Admin'),
            ],
            [
                'name' => 'Supplier',
                'email' => 'supplier@gmail.com',
                'role' => 'supplier',
                'password' => bcrypt('Supplier'),
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}

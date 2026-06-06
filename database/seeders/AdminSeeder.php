<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Administrator',
                'phone' => '081234567890',
                'gender' => 'laki-laki',
                'kelas' => '-',
                'jurusan' => '-',
                'password' => Hash::make('admin123'),
            ]
        );

        $admin->assignRole('admin');
    }
}

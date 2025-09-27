<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Jalankan database seeder.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'nama'     => 'Administrator',
            'password' => Hash::make('admin'), // password: admin
            'level'    => 'admin',
            'fakultas' => '-',
            'jurusan'  => '-',
        ]);
    }
}

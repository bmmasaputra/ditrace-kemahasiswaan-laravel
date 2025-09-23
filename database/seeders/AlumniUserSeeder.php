<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AlumniUserSeeder extends Seeder
{
    /**
     * Jalankan database seeder.
     */
    public function run(): void
    {
        User::create([
            'username' => '223010503000',
            'nama'     => 'Nurdin',
            'password' => Hash::make('12345678'), // password: 12345678
            'level'    => 'alumni',
            'fakultas' => 'Teknik',
            'jurusan'  => 'Teknik Informatika',
        ]);
    }
}

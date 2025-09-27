<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => '223020503060',
            'nama'     => 'Irwin',
            'password' => Hash::make('12345678'), // password: 12345678
            'level'    => 'alumni',
            'fakultas' => 'Teknik',
            'jurusan'  => 'Teknik Informatika',
        ]);
    }
}

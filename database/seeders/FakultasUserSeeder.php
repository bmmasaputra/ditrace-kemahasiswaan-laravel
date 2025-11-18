<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class FakultasUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username'  => 'Operator FKIP',
                'nama'      => 'Operator FKIP',
                'password'  => Hash::make('ditrace101'),
                'thn_lulus' => 1963,
                'level'     => 'fakultas',
                'fakultas'  => 'KEGURUAN DAN ILMU PENDIDIKAN',
                'jurusan'   => '-',
            ],
            [
                'username'  => 'Operator FEB',
                'nama'      => 'Operator FEB',
                'password'  => Hash::make('ditrace102'),
                'thn_lulus' => 1963,
                'level'     => 'fakultas',
                'fakultas'  => 'EKONOMI DAN BISNIS',
                'jurusan'   => '-',
            ],
            [
                'username'  => 'Operator FAPERTA',
                'nama'      => 'Operator FAPERTA',
                'password'  => Hash::make('ditrace103'),
                'thn_lulus' => 1963,
                'level'     => 'fakultas',
                'fakultas'  => 'PERTANIAN',
                'jurusan'   => '-',
            ],
            [
                'username'  => 'Operator FT',
                'nama'      => 'Operator FT',
                'password'  => Hash::make('ditrace104'),
                'thn_lulus' => 1963,
                'level'     => 'fakultas',
                'fakultas'  => 'TEKNIK',
                'jurusan'   => '-',
            ],
            [
                'username'  => 'Operator FH',
                'nama'      => 'Operator FH',
                'password'  => Hash::make('ditrace105'),
                'thn_lulus' => 1963,
                'level'     => 'fakultas',
                'fakultas'  => 'HUKUM',
                'jurusan'   => '-',
            ],
            [
                'username'  => 'Operator FISIP',
                'nama'      => 'Operator FISIP',
                'password'  => Hash::make('ditrace106'),
                'thn_lulus' => 1963,
                'level'     => 'fakultas',
                'fakultas'  => 'ILMU SOSIAL DAN ILMU POLITIK',
                'jurusan'   => '-',
            ],
            [
                'username'  => 'Operator FK',
                'nama'      => 'Operator FK',
                'password'  => Hash::make('ditrace107'),
                'thn_lulus' => 1963,
                'level'     => 'fakultas',
                'fakultas'  => 'KEDOKTERAN',
                'jurusan'   => '-',
            ],
            [
                'username'  => 'Operator PP',
                'nama'      => 'Operator PP',
                'password'  => Hash::make('ditrace108'),
                'thn_lulus' => 1963,
                'level'     => 'fakultas',
                'fakultas'  => 'PROGRAM PASCASARJANA',
                'jurusan'   => '-',
            ],
            [
                'username'  => 'Operator FMIPA',
                'nama'      => 'Operator FMIPA',
                'password'  => Hash::make('ditrace109'),
                'thn_lulus' => 1963,
                'level'     => 'fakultas',
                'fakultas'  => 'MATEMATIKA DAN ILMU PENGETAHUAN ALAM',
                'jurusan'   => '-',
            ],
        ]);
    }
}

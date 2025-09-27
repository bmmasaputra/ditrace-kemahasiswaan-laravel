<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakprodiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('fakprodi')->insert([
            ['id_fakprodi' => '11201', 'prodi' => 'Kedokteran', 'fakultas' => 'Kedokteran'],
            ['id_fakprodi' => '11901', 'prodi' => 'Profesi Dokter', 'fakultas' => 'Kedokteran'],
            ['id_fakprodi' => '22201', 'prodi' => 'Teknik Sipil', 'fakultas' => 'Teknik'],
            ['id_fakprodi' => '23201', 'prodi' => 'Arsitektur', 'fakultas' => 'Teknik'],
            ['id_fakprodi' => '31201', 'prodi' => 'Teknik Pertambangan', 'fakultas' => 'Teknik'],
            ['id_fakprodi' => '41211', 'prodi' => 'Teknologi Industri Pertanian', 'fakultas' => 'Pertanian'],
            ['id_fakprodi' => '41234', 'prodi' => 'Teknologi Hasil Perikanan', 'fakultas' => 'Pertanian'],
            ['id_fakprodi' => '45201', 'prodi' => 'Fisika', 'fakultas' => 'Matematika dan Ilmu Pengetahuan Alam'],
            ['id_fakprodi' => '46201', 'prodi' => 'Biologi', 'fakultas' => 'Matematika dan Ilmu Pengetahuan Alam'],
            ['id_fakprodi' => '47201', 'prodi' => 'Kimia', 'fakultas' => 'Matematika dan Ilmu Pengetahuan Alam'],
            ['id_fakprodi' => '54201', 'prodi' => 'Agribisnis', 'fakultas' => 'Pertanian'],
            ['id_fakprodi' => '54211', 'prodi' => 'Agroteknologi', 'fakultas' => 'Pertanian'],
            ['id_fakprodi' => '54238', 'prodi' => 'Peternakan', 'fakultas' => 'Pertanian'],
            ['id_fakprodi' => '54242', 'prodi' => 'Manajemen Sumber Daya Perairan', 'fakultas' => 'Pertanian'],
            ['id_fakprodi' => '54243', 'prodi' => 'Budidaya Perairan', 'fakultas' => 'Pertanian'],
            ['id_fakprodi' => '54251', 'prodi' => 'Kehutanan', 'fakultas' => 'Pertanian'],
            ['id_fakprodi' => '55201', 'prodi' => 'Teknik Informatika', 'fakultas' => 'Teknik'],
            ['id_fakprodi' => '60101', 'prodi' => 'Ilmu Ekonomi', 'fakultas' => 'Program Pascasarjana'],
            ['id_fakprodi' => '60201', 'prodi' => 'Ekonomi Pembangunan', 'fakultas' => 'Ekonomi'],
            ['id_fakprodi' => '61101', 'prodi' => 'Manajemen', 'fakultas' => 'Program Pascasarjana'],
            ['id_fakprodi' => '61201', 'prodi' => 'Manajemen', 'fakultas' => 'Ekonomi'],
            ['id_fakprodi' => '62201', 'prodi' => 'Akuntansi', 'fakultas' => 'Ekonomi'],
            ['id_fakprodi' => '63201', 'prodi' => 'Ilmu Administrasi Negara', 'fakultas' => 'Ilmu Sosial dan Ilmu Politik'],
            ['id_fakprodi' => '65201', 'prodi' => 'Ilmu Pemerintahan', 'fakultas' => 'Ilmu Sosial dan Ilmu Politik'],
            ['id_fakprodi' => '69201', 'prodi' => 'Sosiologi', 'fakultas' => 'Ilmu Sosial dan Ilmu Politik'],
            ['id_fakprodi' => '74101', 'prodi' => 'Ilmu Hukum', 'fakultas' => 'Program Pascasarjana'],
            ['id_fakprodi' => '74201', 'prodi' => 'Ilmu Hukum', 'fakultas' => 'Hukum'],
            ['id_fakprodi' => '83203', 'prodi' => 'Pendidikan Teknik Mesin', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '83205', 'prodi' => 'Pendidikan Teknik Bangunan', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '84104', 'prodi' => 'Pendidikan Kimia', 'fakultas' => 'Program Pascasarjana'],
            ['id_fakprodi' => '84105', 'prodi' => 'Pendidikan Biologi', 'fakultas' => 'Program Pascasarjana'],
            ['id_fakprodi' => '84202', 'prodi' => 'Pendidikan Matematika', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '84203', 'prodi' => 'Pendidikan Fisika', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '84204', 'prodi' => 'Pendidikan Kimia', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '84205', 'prodi' => 'Pendidikan Biologi', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '85201', 'prodi' => 'Pendidikan Jasmani, Kesehatan & Rekreasi', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '86105', 'prodi' => 'Pendidikan Luar Sekolah', 'fakultas' => 'Program Pascasarjana'],
            ['id_fakprodi' => '86122', 'prodi' => 'Pendidikan Dasar', 'fakultas' => 'Program Pascasarjana'],
            ['id_fakprodi' => '86201', 'prodi' => 'Bimbingan dan Konseling', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '86203', 'prodi' => 'Teknologi Pendidikan', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '86205', 'prodi' => 'Pendikan Luar Sekolah', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '86206', 'prodi' => 'Pendidikan Guru Sekolah Dasar', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '86207', 'prodi' => 'Pendidikan Guru Pendidikan Anak Usia Dini', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '86231', 'prodi' => 'Manajemen Pendidikan', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '86904', 'prodi' => 'Pendidikan Profesi Guru', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '87103', 'prodi' => 'Pendidikan Ekonomi', 'fakultas' => 'Program Pascasarjana'],
            ['id_fakprodi' => '87120', 'prodi' => 'Pendidikan Ilmu Pengetahuan Sosial', 'fakultas' => 'Program Pascasarjana'],
            ['id_fakprodi' => '87203', 'prodi' => 'Pendidikan Ekonomi', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '87205', 'prodi' => 'Pendidikan Pancasila Dan Kewarganegaraan', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '88103', 'prodi' => 'Pendidikan Bahasa Inggris', 'fakultas' => 'Program Pascasarjana'],
            ['id_fakprodi' => '88201', 'prodi' => 'Pendidikan Bahasa Dan Sastra Indonesia', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '88203', 'prodi' => 'Pendidikan Bahasa Inggris', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '88209', 'prodi' => 'Pendidikan Seni Drama Tari dan Musik', 'fakultas' => 'Keguruan dan Ilmu Pendidikan'],
            ['id_fakprodi' => '95029', 'prodi' => 'Ilmu Lingkungan', 'fakultas' => 'Program Pascasarjana'],
            ['id_fakprodi' => '95101', 'prodi' => 'Pengelolaan Sumberdaya Alam & Lingkungan', 'fakultas' => 'Program Pascasarjana'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('provinsi')->insert([
            ['id' => 'id-1024', 'id_prov' => '120000', 'provinsi' => 'Lampung'],
            ['id' => 'id-ac',   'id_prov' => '060000', 'provinsi' => 'Aceh'],
            ['id' => 'id-ba',   'id_prov' => '220000', 'provinsi' => 'Bali'],
            ['id' => 'id-bb',   'id_prov' => '290000', 'provinsi' => 'Bangka Belitung'],
            ['id' => 'id-be',   'id_prov' => '260000', 'provinsi' => 'Bengkulu'],
            ['id' => 'id-bt',   'id_prov' => '280000', 'provinsi' => 'Banten'],
            ['id' => 'id-go',   'id_prov' => '300000', 'provinsi' => 'Gorontalo'],
            ['id' => 'id-ib',   'id_prov' => '320000', 'provinsi' => 'Papua Barat'],
            ['id' => 'id-ja',   'id_prov' => '100000', 'provinsi' => 'Jambi'],
            ['id' => 'id-ji',   'id_prov' => '050000', 'provinsi' => 'Jawa Timur'],
            ['id' => 'id-jk',   'id_prov' => '010000', 'provinsi' => 'Jakarta'],
            ['id' => 'id-jr',   'id_prov' => '020000', 'provinsi' => 'Jawa Barat'],
            ['id' => 'id-jt',   'id_prov' => '030000', 'provinsi' => 'Jawa Tengah'],
            ['id' => 'id-kb',   'id_prov' => '130000', 'provinsi' => 'Kalimantan Barat'],
            ['id' => 'id-ki',   'id_prov' => '160000', 'provinsi' => 'Kalimantan Timur'],
            ['id' => 'id-kr',   'id_prov' => '310000', 'provinsi' => 'Kepulauan Riau'],
            ['id' => 'id-ks',   'id_prov' => '150000', 'provinsi' => 'Kalimantan Selatan'],
            ['id' => 'id-kt',   'id_prov' => '140000', 'provinsi' => 'Kalimantan Tengah'],
            ['id' => 'id-ku',   'id_prov' => '340000', 'provinsi' => 'Kalimantan Utara'],
            ['id' => 'id-la',   'id_prov' => '270000', 'provinsi' => 'Maluku Utara'],
            ['id' => 'id-ma',   'id_prov' => '210000', 'provinsi' => 'Maluku'],
            ['id' => 'id-nb',   'id_prov' => '230000', 'provinsi' => 'Nusa Tenggara Barat'],
            ['id' => 'id-nt',   'id_prov' => '240000', 'provinsi' => 'Nusa Tenggara Timur'],
            ['id' => 'id-pa',   'id_prov' => '250000', 'provinsi' => 'Papua'],
            ['id' => 'id-ri',   'id_prov' => '090000', 'provinsi' => 'Riau'],
            ['id' => 'id-sb',   'id_prov' => '080000', 'provinsi' => 'Sumatera Barat'],
            ['id' => 'id-se',   'id_prov' => '190000', 'provinsi' => 'Sulawesi Selatan'],
            ['id' => 'id-sg',   'id_prov' => '200000', 'provinsi' => 'Sulawesi Tenggara'],
            ['id' => 'id-sl',   'id_prov' => '110000', 'provinsi' => 'Sumatera Selatan'],
            ['id' => 'id-sr',   'id_prov' => '330000', 'provinsi' => 'Sulawesi Barat'],
            ['id' => 'id-st',   'id_prov' => '180000', 'provinsi' => 'Sulawesi Tengah'],
            ['id' => 'id-su',   'id_prov' => '070000', 'provinsi' => 'Sumatera Utara'],
            ['id' => 'id-sw',   'id_prov' => '170000', 'provinsi' => 'Sulawesi Utara'],
            ['id' => 'id-yo',   'id_prov' => '040000', 'provinsi' => 'Yogyakarta'],
            ['id' => 'id-ln',   'id_prov' => '999999', 'provinsi' => 'Luar Negeri'],
        ]);
    }
}

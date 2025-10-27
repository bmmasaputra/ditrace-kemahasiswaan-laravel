<?php

namespace App\Filament\Resources\EvaluasiIkus\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\TracerStudy;

class IkuPekerjaan extends ChartWidget
{
    protected ?string $heading = 'Alumni yang mendapatkan pekerjaan < 6 bulan dan Gaji> 1.2 Kali UMP';

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $countTeknik = TracerStudy::where('fakultas', 'Teknik')
            ->count();

        $countFKIP = TracerStudy::where('fakultas', 'Keguruan dan Ilmu Pendidikan')
            ->count();

        $countKedokteran = TracerStudy::where('fakultas', 'Kedokteran')
            ->count();

        $countPertanian = TracerStudy::where('fakultas', 'Pertanian')
            ->count();

        $countMIPA = TracerStudy::where('fakultas', 'Matematika dan Ilmu Pengetahuan Alam')
            ->count();

        $countPascasarjana = TracerStudy::where('fakultas', 'Program Pascasarjana')
            ->count();

        $countEkonomi = TracerStudy::where('fakultas', 'Ekonomi')
            ->count();

        $countFISIP = TracerStudy::where('fakultas', 'Ilmu Sosial dan Ilmu Politik')
            ->count();

        $countHukum = TracerStudy::where('fakultas', 'Hukum')
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Mahasiswa',
                    'data' => [
                        $countTeknik,
                        $countFKIP,
                        $countKedokteran,
                        $countPertanian,
                        $countMIPA,
                        $countPascasarjana,
                        $countEkonomi,
                        $countFISIP,
                        $countHukum
                    ],
                    'backgroundColor' => [
                        '#2196F3', // warna untuk label pertama (Total Mahasiswa)
                        // '#4CAF50', // warna untuk label kedua (Sudah Mengisi)
                    ],
                    'hoverOffset' => 10,
                ]
            ],
            'labels' => ['Teknik', 'FKIP', 'Kedokteran', 'Pertanian', 'MIPA', 'Pascasarjana', 'Ekonomi', 'FISIP', 'Hukum']
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

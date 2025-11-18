<?php

namespace App\Filament\Resources\EvaluasiIkus\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\TracerStudy;

class IkuStudiLanjut extends ChartWidget
{
    protected ?string $heading = ' Alumni yang melanjutkan pendidikan maksimal 12 bulan setelah lulus';

    protected int | string | array $columnSpan = 'full';

    public ?string $filter = null;

    public function mount(): void
    {
        $this->filter = date('Y');
    }

    protected function getFilters(): ?array
    {
        return array_combine(
            range(date('Y'), date('Y') - 10),
            range(date('Y'), date('Y') - 10)
        );
    }

    protected function getData(): array
    {
        $gradYear = $this->filter;

        $countTeknik = TracerStudy::where('fakultas', 'Teknik')
            ->where('f8', '4')
            ->count();

        $countFKIP = TracerStudy::where('fakultas', 'Keguruan dan Ilmu Pendidikan')
            ->where('f8', '4')
            ->count();

        $countKedokteran = TracerStudy::where('fakultas', 'Kedokteran')
            ->where('f8', '4')
            ->count();

        $countPertanian = TracerStudy::where('fakultas', 'Pertanian')
            ->where('f8', '4')
            ->count();

        $countMIPA = TracerStudy::where('fakultas', 'Matematika dan Ilmu Pengetahuan Alam')
            ->where('f8', '4')
            ->count();

        $countPascasarjana = TracerStudy::where('fakultas', 'Program Pascasarjana')
            ->where('f8', '4')
            ->count();

        $countEkonomi = TracerStudy::where('fakultas', 'Ekonomi')
            ->where('f8', '4')
            ->count();

        $countFISIP = TracerStudy::where('fakultas', 'Ilmu Sosial dan Ilmu Politik')
            ->where('f8', '4')
            ->count();

        $countHukum = TracerStudy::where('fakultas', 'Hukum')
            ->where('f8', '4')
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

<?php

namespace App\Filament\Resources\EvaluasiIkus\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\TracerStudy;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Widgets\ChartWidget\Concerns\HasFiltersSchema;

class IkuPekerjaan extends ChartWidget
{
    // use HasFiltersSchema;

    protected ?string $heading = 'Alumni yang mendapatkan pekerjaan < 6 bulan dan Gaji> 1.2 Kali UMP';

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
            ->where('f8', '1')
            ->where('thn_lulus', $gradYear)
            ->where('f505', '>', 4230185)
            ->where(function ($query) {
                $query->where('f504', '1')
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('f504', '!=', '1')
                            ->where('f506', '<=', 6);
                    });
            })
            ->count();

        $countFKIP = TracerStudy::where('fakultas', 'Keguruan dan Ilmu Pendidikan')
            ->where('f8', '1')
            ->where('thn_lulus', $gradYear)
            ->where('f505', '>', 4230185)
            ->where(function ($query) {
                $query->where('f504', '1')
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('f504', '!=', '1')
                            ->where('f506', '<=', 6);
                    });
            })
            ->count();

        $countKedokteran = TracerStudy::where('fakultas', 'Kedokteran')
            ->where('f8', '1')
            ->where('thn_lulus', $gradYear)
            ->where('f505', '>', 4230185)
            ->where(function ($query) {
                $query->where('f504', '1')
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('f504', '!=', '1')
                            ->where('f506', '<=', 6);
                    });
            })
            ->count();

        $countPertanian = TracerStudy::where('fakultas', 'Pertanian')
            ->where('f8', '1')
            ->where('thn_lulus', $gradYear)
            ->where('f505', '>', 4230185)
            ->where(function ($query) {
                $query->where('f504', '1')
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('f504', '!=', '1')
                            ->where('f506', '<=', 6);
                    });
            })
            ->count();

        $countMIPA = TracerStudy::where('fakultas', 'Matematika dan Ilmu Pengetahuan Alam')
            ->where('f8', '1')
            ->where('thn_lulus', $gradYear)
            ->where('f505', '>', 4230185)
            ->where(function ($query) {
                $query->where('f504', '1')
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('f504', '!=', '1')
                            ->where('f506', '<=', 6);
                    });
            })
            ->count();

        $countPascasarjana = TracerStudy::where('fakultas', 'Program Pascasarjana')
            ->where('f8', '1')
            ->where('thn_lulus', $gradYear)
            ->where('f505', '>', 4230185)
            ->where(function ($query) {
                $query->where('f504', '1')
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('f504', '!=', '1')
                            ->where('f506', '<=', 6);
                    });
            })
            ->count();

        $countEkonomi = TracerStudy::where('fakultas', 'Ekonomi')
            ->where('f8', '1')
            ->where('thn_lulus', $gradYear)
            ->where('f505', '>', 4230185)
            ->where(function ($query) {
                $query->where('f504', '1')
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('f504', '!=', '1')
                            ->where('f506', '<=', 6);
                    });
            })
            ->count();

        $countFISIP = TracerStudy::where('fakultas', 'Ilmu Sosial dan Ilmu Politik')
            ->where('f8', '1')
            ->where('thn_lulus', $gradYear)
            ->where('f505', '>', 4230185)
            ->where(function ($query) {
                $query->where('f504', '1')
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('f504', '!=', '1')
                            ->where('f506', '<=', 6);
                    });
            })
            ->count();

        $countHukum = TracerStudy::where('fakultas', 'Hukum')
            ->where('f8', '1')
            ->where('thn_lulus', $gradYear)
            ->where('f505', '>', 4230185)
            ->where(function ($query) {
                $query->where('f504', '1')
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('f504', '!=', '1')
                            ->where('f506', '<=', 6);
                    });
            })
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

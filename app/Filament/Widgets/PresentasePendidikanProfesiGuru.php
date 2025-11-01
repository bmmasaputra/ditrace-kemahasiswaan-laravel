<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use App\Models\TracerStudy;
use Illuminate\Support\Facades\Auth;

class PresentasePendidikanProfesiGuru extends ChartWidget
{
    use InteractsWithPageFilters;

    protected ?string $heading = 'Presentase Pendidikan Profesi Guru';

    protected static bool $isLazy = false;

    protected function getData(): array
    {
        $tahunLulus = $this->pageFilters['Tahun'] ?? null;

        $counttotalMahasiswa = User::where('jurusan', 'Pendidikan Profesi Guru')
            ->where('thn_lulus', $tahunLulus)
            ->count();
        $countTracerStudy = TracerStudy::where('prodi', 'Pendidikan Profesi Guru')
            ->where('thn_lulus', $tahunLulus)
            ->where('f8', '!=', '')
            ->count();

        $belumMengisi = $counttotalMahasiswa - $countTracerStudy;

        return [
            'datasets' => [
                [
                    'label' => 'Mahasiswa',
                    'data' => [$belumMengisi, $countTracerStudy],
                    'backgroundColor' => [
                        '#2196F3', // warna untuk label pertama (Total Mahasiswa)
                        '#4CAF50', // warna untuk label kedua (Sudah Mengisi)
                    ],
                    'hoverOffset' => 10,
                ]
            ],
            'labels' => ['Belum Mengisi Tracer Study', 'Sudah Mengisi Tracer Study']
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    public static function canView(): bool
    {
        $user = Auth::user();

        if ($user->level == 'fakultas') {
            return true;
        }

        $filters = request()->query('filters', []);

        $fakultas = $filters['Fakultas'] ?? null;

        // Only show widget if Fakultas is "Teknik"
        if ($fakultas !== 'Keguruan dan Ilmu Pendidikan') {
            return false;
        }

        return true;
    }

    public function getColumnSpan(): int|string|array
    {
        return [
            'sm' => 'full', // full width on small
            'lg' => 1,      // span 2 columns on large screens
        ];
    }
}

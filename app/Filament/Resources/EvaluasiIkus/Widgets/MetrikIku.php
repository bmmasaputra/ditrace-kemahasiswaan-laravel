<?php

namespace App\Filament\Resources\EvaluasiIkus\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\TracerStudy;

class MetrikIku extends StatsOverviewWidget
{
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

    protected function getStats(): array
    {
        $alumniBekerja = TracerStudy::where('f8', '1')
            // ->where('thn_lulus', $gradYear)
            ->where('f505', '>', 4230185)
            ->where(function ($query) {
                $query->where('f504', '1')
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('f504', '!=', '1')
                            ->where('f506', '<=', 6);
                    });
            })
            ->count();

        $alumniStudiLanjut = TracerStudy::where('f8', '4')->count();


        $alumniWirausaha = TracerStudy::where('f8', '3')
            // ->where('thn_lulus', $gradYear)
            ->where('f5c', '<>', '3')
            ->where('f505', '>', 4230185)
            ->where(function ($query) {
                $query->where('f504', '1')
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('f504', '!=', '1')
                            ->where('f506', '<=', 6);
                    });
            })
            ->count();

        $totalAlumni = TracerStudy::count();

        $AlumniKriteria = $alumniBekerja + $alumniStudiLanjut + $alumniWirausaha;

        $presentase = ($totalAlumni > 0) ? round(($AlumniKriteria / $totalAlumni) * 100) : 0;

        return [
            Stat::make('Jumlah Alumni Sesuai Kriteria', $AlumniKriteria)
                ->description('Alumni yang memenuhi kriteria IKU.')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Jumlah Total Alumni', $totalAlumni)
                ->description('Jumlah total alumni yang terdaftar.')
                ->chart([10, 5, 2, 3, 10, 4, 5])
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Presentase %', $presentase)
                ->description('Presentase alumni yang sesuai kriteria.')
                ->chart([1, 2, 3, 4, 5, 6, 3])
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
        ];
    }
}

<?php

namespace App\Filament\Resources\TracerStudies\Pages;

use App\Filament\Resources\TracerStudies\TracerStudyResource;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Filament\Imports\TracerStudyImporter;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use pxlrbt\FilamentExcel\Columns\Column;
use App\Filament\Imports\IdentitasImporter;
use Filament\Actions\ImportAction;
use App\Models\Provinsi;
use App\Models\Daerah;
use App\Models\TracerStudy;

class ListTracerStudies extends ListRecords
{
    protected static string $resource = TracerStudyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make('DataMahasiswaImport')
                ->importer(IdentitasImporter::class)
                ->label('Import Data Mahasiswa (CSV)')
                ->color('primary'),
            ImportAction::make('TracerStudyImport')
                ->importer(TracerStudyImporter::class)
                ->label('Import Kuisioner (CSV)')
                ->color('primary'),
            CreateAction::make(),
            ExportAction::make()
                ->exports([
                    ExcelExport::make()
                        ->fromTable()
                        ->withFilename(fn($resource) => $resource::getModelLabel() . '-' . date('Y-m-d-H-i-s'))
                        ->withWriterType(\Maatwebsite\Excel\Excel::XLSX)
                        ->withColumns([
                            Column::make('domisili')
                                ->formatStateUsing(function ($state, $record) {
                                    // $state is the stored province name in your table
                                    $province = Provinsi::where('id', $state)->first();
                                    return $province ? $province->id_prov : '';
                                }),
                            Column::make('daerah')
                                ->formatStateUsing(function ($state, $record) {
                                    // $state is the stored province name in your table
                                    $region = Daerah::where('daerah', $state)->first();
                                    return $region ? $region->id_daerah : '';
                                }),
                            Column::make('alamat'),
                            Column::make('nik'),
                            Column::make('f8'),
                            Column::make('f504'),
                            Column::make('f502'),
                            Column::make('f505'),
                            Column::make('f506'),
                            Column::make('f5a1')
                                ->formatStateUsing(function ($state, $record) {
                                    // $state is the stored province name in your table
                                    $province = Provinsi::where('id', $state)->first();
                                    return $province ? $province->id_prov : '';
                                }),
                            Column::make('f5a2')
                                ->formatStateUsing(function ($state, $record) {
                                    // $state is the stored province name in your table
                                    $region = Daerah::where('daerah', $state)->first();
                                    return $region ? $region->id_daerah : '';
                                }),
                            Column::make('f1101'),
                            Column::make('f1102'),
                            Column::make('f5b'),
                            Column::make('f5c'),
                            Column::make('f5d'),
                            Column::make('f18a'),
                            Column::make('f18b'),
                            Column::make('f18c'),
                            Column::make('f18d'),
                            Column::make('f1201'),
                            Column::make('f1202'),
                            Column::make('f14'),
                            Column::make('f15'),
                            Column::make('f1761'),
                            Column::make('f1762'),
                            Column::make('f1763'),
                            Column::make('f1764'),
                            Column::make('f1765'),
                            Column::make('f1766'),
                            Column::make('f1767'),
                            Column::make('f1768'),
                            Column::make('f1769'),
                            Column::make('f1770'),
                            Column::make('f1771'),
                            Column::make('f1772'),
                            Column::make('f1773'),
                            Column::make('f1774'),
                            Column::make('f21'),
                            Column::make('f22'),
                            Column::make('f23'),
                            Column::make('f24'),
                            Column::make('f25'),
                            Column::make('f26'),
                            Column::make('f27'),
                            Column::make('f301'),
                            Column::make('f302'),
                            Column::make('f303'),
                            Column::make('f401'),
                            Column::make('f402'),
                            Column::make('f403'),
                            Column::make('f404'),
                            Column::make('f405'),
                            Column::make('f406'),
                            Column::make('f407'),
                            Column::make('f408'),
                            Column::make('f409'),
                            Column::make('f410'),
                            Column::make('f411'),
                            Column::make('f412'),
                            Column::make('f413'),
                            Column::make('f414'),
                            Column::make('f415'),
                            Column::make('f416'),
                            Column::make('f6'),
                            Column::make('f7'),
                            Column::make('f7a'),
                            Column::make('f1001'),
                            Column::make('f1002'),
                            Column::make('f1601'),
                            Column::make('f1602'),
                            Column::make('f1603'),
                            Column::make('f1604'),
                            Column::make('f1605'),
                            Column::make('f1606'),
                            Column::make('f1607'),
                            Column::make('f1608'),
                            Column::make('f1609'),
                            Column::make('f1610'),
                            Column::make('f1611'),
                            Column::make('f1612'),
                            Column::make('f1613'),
                            Column::make('f1614'),
                            Column::make('timestamp'),
                        ])
                        ->ignoreFormatting(['thn_lulus']),
                ]),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'Kedokteran' => Tab::make()->query(fn(Builder $query) => $query->where('fakultas', 'Kedokteran')),
            'Teknik' => Tab::make()->query(fn(Builder $query) => $query->where('fakultas', 'Teknik')),
            'Pertanian' => Tab::make()->query(fn(Builder $query) => $query->where('fakultas', 'Pertanian')),
            'FMIPA' => Tab::make()->query(fn(Builder $query) => $query->where('fakultas', 'Matematika dan Ilmu Pengetahuan Alam')),
            'Ekonomi' => Tab::make()->query(fn(Builder $query) => $query->where('fakultas', 'Ekonomi')),
            'FISIP' => Tab::make()->query(fn(Builder $query) => $query->where('fakultas', 'Ilmu Sosial dan Ilmu Politik')),
            'Hukum' => Tab::make()->query(fn(Builder $query) => $query->where('fakultas', 'Hukum')),
            'FKIP' => Tab::make()->query(fn(Builder $query) => $query->where('fakultas', 'Keguruan dan Ilmu Pendidikan')),
        ];
    }
}

<?php

namespace App\Filament\Imports;

use App\Models\TracerStudy;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Number;
use App\Models\Provinsi;
use App\Models\Daerah;

class TracerStudyImporter extends Importer
{
    protected static ?string $model = TracerStudy::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nim')
                ->requiredMapping()
                ->rules(['required', 'max:20']),
            ImportColumn::make('nama')
                ->requiredMapping()
                ->rules(['required', 'max:150']),
            ImportColumn::make('fakultas')
                ->requiredMapping()
                ->rules(['required', 'max:150']),
            ImportColumn::make('prodi')
                ->requiredMapping()
                ->rules(['required', 'max:150']),
            ImportColumn::make('thn_lulus')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('domisili')
                ->rules(['max:150']),
            ImportColumn::make('daerah')
                ->rules(['max:150']),
            ImportColumn::make('alamat'),
            ImportColumn::make('no_telp')
                ->rules(['max:13']),
            ImportColumn::make('mail')
                ->rules(['max:50']),
            ImportColumn::make('nik'),
            ImportColumn::make('npwp')
                ->rules(['max:50']),
            ImportColumn::make('f8')
                ->requiredMapping()
                ->rules(['required', 'max:2']),
            ImportColumn::make('f504'),
            ImportColumn::make('f502'),
            ImportColumn::make('f505'),
            ImportColumn::make('f506'),
            ImportColumn::make('f5a1'),
            ImportColumn::make('f5a2'),
            ImportColumn::make('f1101'),
            ImportColumn::make('f1102'),
            ImportColumn::make('f5b'),
            ImportColumn::make('f5c'),
            ImportColumn::make('f5d'),
            ImportColumn::make('f18a'),
            ImportColumn::make('f18b'),
            ImportColumn::make('f18c'),
            ImportColumn::make('f18d'),
            ImportColumn::make('f1201'),
            ImportColumn::make('f1202'),
            ImportColumn::make('f14'),
            ImportColumn::make('f15'),
            ImportColumn::make('f1761'),
            ImportColumn::make('f1762'),
            ImportColumn::make('f1763'),
            ImportColumn::make('f1764'),
            ImportColumn::make('f1765'),
            ImportColumn::make('f1766'),
            ImportColumn::make('f1767'),
            ImportColumn::make('f1768'),
            ImportColumn::make('f1769'),
            ImportColumn::make('f1770'),
            ImportColumn::make('f1771'),
            ImportColumn::make('f1772'),
            ImportColumn::make('f1773'),
            ImportColumn::make('f1774'),
            ImportColumn::make('f21'),
            ImportColumn::make('f22'),
            ImportColumn::make('f23'),
            ImportColumn::make('f24'),
            ImportColumn::make('f25'),
            ImportColumn::make('f26'),
            ImportColumn::make('f27'),
            ImportColumn::make('f301'),
            ImportColumn::make('f302'),
            ImportColumn::make('f303'),
            ImportColumn::make('f401')
                ->numeric(),
            ImportColumn::make('f402')
                ->numeric(),
            ImportColumn::make('f403')
                ->numeric(),
            ImportColumn::make('f404')
                ->numeric(),
            ImportColumn::make('f405')
                ->numeric(),
            ImportColumn::make('f406')
                ->numeric(),
            ImportColumn::make('f407')
                ->numeric(),
            ImportColumn::make('f408')
                ->numeric(),
            ImportColumn::make('f409')
                ->numeric(),
            ImportColumn::make('f410')
                ->numeric(),
            ImportColumn::make('f411')
                ->numeric(),
            ImportColumn::make('f412')
                ->numeric(),
            ImportColumn::make('f413')
                ->numeric(),
            ImportColumn::make('f414')
                ->numeric(),
            ImportColumn::make('f415')
                ->numeric(),
            ImportColumn::make('f416')
                ->numeric(),
            ImportColumn::make('f6'),
            ImportColumn::make('f7'),
            ImportColumn::make('f7a'),
            ImportColumn::make('f1001'),
            ImportColumn::make('f1002'),
            ImportColumn::make('f1601')
                ->numeric(),
            ImportColumn::make('f1602')
                ->numeric(),
            ImportColumn::make('f1603')
                ->numeric(),
            ImportColumn::make('f1604')
                ->numeric(),
            ImportColumn::make('f1605')
                ->numeric(),
            ImportColumn::make('f1606')
                ->numeric(),
            ImportColumn::make('f1607')
                ->numeric(),
            ImportColumn::make('f1608')
                ->numeric(),
            ImportColumn::make('f1609')
                ->numeric(),
            ImportColumn::make('f1610')
                ->numeric(),
            ImportColumn::make('f1611')
                ->numeric(),
            ImportColumn::make('f1612')
                ->numeric(),
            ImportColumn::make('f1613')
                ->numeric(),
            ImportColumn::make('f1614')
                ->numeric(),
        ];
    }

    protected function beforeSave(): void
    {
        // Get the domisili value from import data
        $domisiliName = $this->data['domisili'];
        $daerahName = $this->data['daerah'];

        // Find province by name
        $province = Provinsi::where('id', $domisiliName)->first();
        $daerah = Daerah::where('daerah', $daerahName)->first();

        // If found, replace domisili with province code
        if ($province) {
            $this->record->domisili = $province->id_prov;
        }

        // If found, replace domisili with daerah code
        if ($daerah) {
            $this->record->daerah = $daerah->id_daerah;
        }
    }

    protected function afterSave(): void
    {
        $mhs = $this->record;
        $nim = (int) $mhs->nim;

        User::firstOrCreate(
            ['id' => $nim],
            [
                'username' => $mhs->nim,
                'nama' => $mhs->nama,
                'password' => Hash::make($mhs->nim),
                'thn_lulus' => $mhs->thn_lulus,
                'level' => 'alumni',
                'fakultas' => $mhs->fakultas,
                'jurusan' => $mhs->prodi,
            ]
        );

        // if (!$user) {
        //     User::create([
        //         'id' => $nim,
        //         'username' => $mhs->nim,
        //         'nama' => $mhs->nama,
        //         'password' => Hash::make($mhs->nim),
        //         'thn_lulus' => $mhs->thn_lulus,
        //         'level' => 'alumni',
        //         'fakultas' => $mhs->fakultas,
        //         'jurusan' => $mhs->prodi,
        //     ]);
        // }
    }

    public function resolveRecord(): TracerStudy
    {
        return TracerStudy::firstOrNew([
            'nim' => $this->data['nim'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your tracer study import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}

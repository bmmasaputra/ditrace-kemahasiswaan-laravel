<?php

namespace App\Filament\Imports;

use App\Models\TracerStudy;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use App\Models\User;
use Illuminate\Support\Number;
use Illuminate\Support\Facades\Hash;

class IdentitasImporter extends Importer
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
        ];
    }

    public function resolveRecord(): TracerStudy
    {
        return new TracerStudy();
    }

    protected function afterSave(): void
    {
        $mhs = $this->record;
        $nim = (int) $mhs->nim;
        $user = User::where('id', $nim)->first();

        if (!$user) {
            User::create([
                'id' => $nim,
                'username' => $mhs->nim,
                'nama' => $mhs->nama,
                'password' => Hash::make($mhs->nim),
                'thn_lulus' => $mhs->thn_lulus,
                'level' => 'alumni',
                'fakultas' => $mhs->fakultas,
                'jurusan' => $mhs->prodi,
            ]);
        }
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your identita import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}

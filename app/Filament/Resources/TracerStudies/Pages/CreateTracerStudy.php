<?php

namespace App\Filament\Resources\TracerStudies\Pages;

use App\Filament\Resources\TracerStudies\TracerStudyResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateTracerStudy extends CreateRecord
{
    protected static string $resource = TracerStudyResource::class;

    protected static bool $canCreateAnother = false;

    protected function afterCreate(): void
    {
        // Insert into users table
        User::create([
            'id'            => $this->record->nim, // NIM becomes user ID
            'username'      => $this->record->nim, // NIM as username
            'password'      => Hash::make($this->record->nim), // hash NIM as password
            'nama'          => $this->record->nama,
            'thn_lulus'      => $this->record->thn_lulus,
            'level'         => 'alumni',
            'fakultas'      => $this->record->fakultas,
            'jurusan'      => $this->record->prodi,
        ]);
    }
}

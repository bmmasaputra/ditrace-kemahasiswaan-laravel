<?php

namespace App\Filament\Alumni\Resources\Identitas\Pages;

use App\Filament\Alumni\Resources\Identitas\IdentitaResource;
use App\Models\Identita;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\ListRecords;

class ListIdentitas extends ListRecords
{
    protected static string $resource = IdentitaResource::class;

    public function mount(): void
    {
        parent::mount();

        $user = Auth::user();
        // Map this to your NIM source. If your User has 'username' that equals NIM:
        $nim = $user?->username; // or $user?->nim, adjust to your app

        if (! $nim) {
            // Fallback: stay on list or show a message
            $this->notify('danger', 'Your account has no username/NIM set.');
            return;
        }

        // dd($user->fakultas);

        // Ensure there is a record; if not, create a blank one for this nim
        $identitas = Identita::firstOrCreate(
            ['nim' => (string) $nim], // cast to string if your PK is string
            [
                'nama'     => $user->nama,
                'fakultas' => $user->fakultas,
                'prodi'    => $user->jurusan, // make sure this maps correctly
            ]
        );

        // Go straight to Edit page
        $this->redirect(IdentitaResource::getUrl('edit', ['record' => $identitas]));
    }

    // Hide header actions so users don't try to create others, etc.
    protected function getHeaderActions(): array
    {
        return [];
    }
}

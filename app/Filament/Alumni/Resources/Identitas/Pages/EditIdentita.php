<?php

namespace App\Filament\Alumni\Resources\Identitas\Pages;

use App\Filament\Alumni\Resources\Identitas\IdentitaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIdentita extends EditRecord
{
    protected static string $resource = IdentitaResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}

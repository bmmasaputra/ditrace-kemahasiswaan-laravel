<?php

namespace App\Filament\Resources\Tentangs\Pages;

use App\Filament\Resources\Tentangs\TentangResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTentang extends EditRecord
{
    protected static string $resource = TentangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

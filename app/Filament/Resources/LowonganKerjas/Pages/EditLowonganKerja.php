<?php

namespace App\Filament\Resources\LowonganKerjas\Pages;

use App\Filament\Resources\LowonganKerjas\LowonganKerjaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLowonganKerja extends EditRecord
{
    protected static string $resource = LowonganKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

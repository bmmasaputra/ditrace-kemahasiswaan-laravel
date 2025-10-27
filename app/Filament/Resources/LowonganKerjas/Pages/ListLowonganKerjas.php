<?php

namespace App\Filament\Resources\LowonganKerjas\Pages;

use App\Filament\Resources\LowonganKerjas\LowonganKerjaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLowonganKerjas extends ListRecords
{
    protected static string $resource = LowonganKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

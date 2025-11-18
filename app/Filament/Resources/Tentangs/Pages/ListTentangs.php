<?php

namespace App\Filament\Resources\Tentangs\Pages;

use App\Filament\Resources\Tentangs\TentangResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTentangs extends ListRecords
{
    protected static string $resource = TentangResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}

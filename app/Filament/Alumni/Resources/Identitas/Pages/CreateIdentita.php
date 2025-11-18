<?php

namespace App\Filament\Alumni\Resources\Identitas\Pages;

use App\Filament\Alumni\Resources\Identitas\IdentitaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIdentita extends CreateRecord
{
    protected static string $resource = IdentitaResource::class;

    protected static bool $canCreateAnother = false;
}

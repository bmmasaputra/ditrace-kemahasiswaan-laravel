<?php

namespace App\Filament\Resources\ChangePasswords\Pages;

use App\Filament\Resources\ChangePasswords\ChangePasswordResource;
use Filament\Resources\Pages\CreateRecord;

class CreateChangePassword extends CreateRecord
{
    protected static string $resource = ChangePasswordResource::class;
}

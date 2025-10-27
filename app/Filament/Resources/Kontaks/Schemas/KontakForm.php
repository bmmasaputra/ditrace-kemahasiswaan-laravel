<?php

namespace App\Filament\Resources\Kontaks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KontakForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('mail')
                    ->label('Email')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Tentangs\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class TentangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                RichEditor::make('redaksi')
                    ->label('Redaksi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}

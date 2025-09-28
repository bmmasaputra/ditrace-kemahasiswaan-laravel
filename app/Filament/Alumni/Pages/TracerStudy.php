<?php

namespace App\Filament\Alumni\Pages;

use Filament\Support\Icons\Heroicon;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;

class TracerStudy extends Page
{
    protected string $view = 'filament.alumni.pages.tracer-study';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public ?string $name = null;

    // Define the page form schema (NOT getSchema)
    public function getForm(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Tracer Study')->schema([
                TextInput::make('name')->label('Name')->required()->maxLength(255),
            ]),
        ]);
    }
    
}

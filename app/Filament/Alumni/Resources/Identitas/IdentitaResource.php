<?php

namespace App\Filament\Alumni\Resources\Identitas;

use App\Filament\Alumni\Resources\Identitas\Pages\CreateIdentita;
use App\Filament\Alumni\Resources\Identitas\Pages\EditIdentita;
use App\Filament\Alumni\Resources\Identitas\Pages\ListIdentitas;
use App\Filament\Alumni\Resources\Identitas\Schemas\IdentitaForm;
use App\Filament\Alumni\Resources\Identitas\Tables\IdentitasTable;
use App\Models\Identita;
use App\Models\TracerStudy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IdentitaResource extends Resource
{
    protected static ?string $model = TracerStudy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';
    
    protected static ?string $label = 'Tracer Study';

    protected static ?string $navigationLabel = 'Tracer Study';

    public static function form(Schema $schema): Schema
    {
        return IdentitaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IdentitasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIdentitas::route('/'),
            'edit' => EditIdentita::route('/{record}/edit'),
        ];
    }
}

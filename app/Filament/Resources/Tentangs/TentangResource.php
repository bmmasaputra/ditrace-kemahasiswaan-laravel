<?php

namespace App\Filament\Resources\Tentangs;

use App\Filament\Resources\Tentangs\Pages\CreateTentang;
use App\Filament\Resources\Tentangs\Pages\EditTentang;
use App\Filament\Resources\Tentangs\Pages\ListTentangs;
use App\Filament\Resources\Tentangs\Schemas\TentangForm;
use App\Filament\Resources\Tentangs\Tables\TentangsTable;
use App\Models\Tentang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;
use Filament\Tables\Table;

class TentangResource extends Resource
{
    protected static ?string $model = Tentang::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string | UnitEnum | null $navigationGroup = 'Pages';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return TentangForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TentangsTable::configure($table);
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
            'index' => ListTentangs::route('/'),
            'create' => CreateTentang::route('/create'),
            'edit' => EditTentang::route('/{record}/edit'),
        ];
    }
}

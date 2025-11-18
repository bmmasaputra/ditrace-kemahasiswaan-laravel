<?php

namespace App\Filament\Resources\LowonganKerjas;

use App\Filament\Resources\LowonganKerjas\Pages\CreateLowonganKerja;
use App\Filament\Resources\LowonganKerjas\Pages\EditLowonganKerja;
use App\Filament\Resources\LowonganKerjas\Pages\ListLowonganKerjas;
use App\Filament\Resources\LowonganKerjas\Schemas\LowonganKerjaForm;
use App\Filament\Resources\LowonganKerjas\Tables\LowonganKerjasTable;
use App\Models\LowonganKerja;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;
use Filament\Tables\Table;

class LowonganKerjaResource extends Resource
{
    protected static ?string $model = LowonganKerja::class;

    protected static string | UnitEnum | null $navigationGroup = 'Pages';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return LowonganKerjaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LowonganKerjasTable::configure($table);
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
            'index' => ListLowonganKerjas::route('/'),
            'create' => CreateLowonganKerja::route('/create'),
            'edit' => EditLowonganKerja::route('/{record}/edit'),
        ];
    }
}

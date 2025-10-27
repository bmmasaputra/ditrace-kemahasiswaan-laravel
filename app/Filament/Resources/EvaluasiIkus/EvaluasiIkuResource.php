<?php

namespace App\Filament\Resources\EvaluasiIkus;

use App\Filament\Resources\EvaluasiIkus\Pages\CreateEvaluasiIku;
use App\Filament\Resources\EvaluasiIkus\Pages\EditEvaluasiIku;
use App\Filament\Resources\EvaluasiIkus\Pages\ListEvaluasiIkus;
use App\Filament\Resources\EvaluasiIkus\Schemas\EvaluasiIkuForm;
use App\Filament\Resources\EvaluasiIkus\Tables\EvaluasiIkusTable;
use App\Models\TracerStudy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\EvaluasiIkus\Widgets\IkuPekerjaan;
use Filament\Tables\Table;

class EvaluasiIkuResource extends Resource
{
    protected static ?string $model = TracerStudy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nim';

    protected static ?string $label = 'Evaluasi IKU';

    public static function form(Schema $schema): Schema
    {
        return EvaluasiIkuForm::configure($schema);
    }

    // public static function table(Table $table): Table
    // {
    //     return EvaluasiIkusTable::configure($table);
    // }

    public static function getWidgets(): array
    {
        return [
            IkuPekerjaan::class,
        ];
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
            'index' => ListEvaluasiIkus::route('/'),
            'create' => CreateEvaluasiIku::route('/create'),
            'edit' => EditEvaluasiIku::route('/{record}/edit'),
        ];
    }
}

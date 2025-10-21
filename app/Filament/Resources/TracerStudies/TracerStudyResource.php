<?php

namespace App\Filament\Resources\TracerStudies;

use App\Filament\Resources\TracerStudies\Pages\CreateTracerStudy;
use App\Filament\Resources\TracerStudies\Pages\EditTracerStudy;
use App\Filament\Resources\TracerStudies\Pages\ListTracerStudies;
use App\Filament\Resources\TracerStudies\Pages\ViewTracerStudy;
use App\Filament\Resources\TracerStudies\Schemas\TracerStudyForm;
use App\Filament\Resources\TracerStudies\Schemas\TracerStudyInfolist;
use App\Filament\Resources\TracerStudies\Tables\TracerStudiesTable;
use App\Models\TracerStudy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TracerStudyResource extends Resource
{
    protected static ?string $model = TracerStudy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return TracerStudyForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TracerStudyInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TracerStudiesTable::configure($table);
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
            'index' => ListTracerStudies::route('/'),
            'create' => CreateTracerStudy::route('/create'),
            'view' => ViewTracerStudy::route('/{record}'),
            'edit' => EditTracerStudy::route('/{record}/edit'),
        ];
    }
}

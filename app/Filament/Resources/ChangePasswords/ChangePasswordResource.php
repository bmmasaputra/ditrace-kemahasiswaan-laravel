<?php

namespace App\Filament\Resources\ChangePasswords;

use App\Filament\Resources\ChangePasswords\Pages\CreateChangePassword;
use App\Filament\Resources\ChangePasswords\Pages\EditChangePassword;
use App\Filament\Resources\ChangePasswords\Pages\ListChangePasswords;
use App\Filament\Resources\ChangePasswords\Schemas\ChangePasswordForm;
use App\Filament\Resources\ChangePasswords\Tables\ChangePasswordsTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ChangePasswordResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return ChangePasswordForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ChangePasswordsTable::configure($table);
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
            'index' => ListChangePasswords::route('/'),
            'edit' => EditChangePassword::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}

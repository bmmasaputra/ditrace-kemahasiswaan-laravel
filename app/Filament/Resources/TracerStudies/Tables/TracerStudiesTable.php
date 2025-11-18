<?php

namespace App\Filament\Resources\TracerStudies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TracerStudiesTable
{
    public static function configure(Table $table): Table
    {
        $userLevel = Auth::user()->level;

        return $table
            ->columns([
                TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable(),
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('fakultas')
                    ->searchable(),
                TextColumn::make('prodi')
                    ->searchable(),
                TextColumn::make('thn_lulus')
                    ->label('Tahun Lulus'),
                TextColumn::make('no_telp')
                    ->searchable(),
                TextColumn::make('mail')
                    ->searchable(),
                TextColumn::make('npwp')
                    ->searchable(),
                TextColumn::make('timestamp')
                    ->label('Terakhir Diperbarui')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('thn_lulus')
                    // ->multiple()
                    ->options([
                        array_combine(
                            range(date('Y'), date('Y') - 7),
                            range(date('Y'), date('Y') - 7)
                        )
                    ])
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()
                    ->visible(fn() => in_array($userLevel, ['admin'])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->visible(fn() => $userLevel === 'admin'),
                ]),
            ]);
    }
}

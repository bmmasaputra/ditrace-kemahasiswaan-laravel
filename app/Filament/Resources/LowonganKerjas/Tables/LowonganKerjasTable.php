<?php

namespace App\Filament\Resources\LowonganKerjas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LowonganKerjasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_perusahaan')
                    ->searchable(),
                TextColumn::make('posisi')
                    ->searchable(),
                TextColumn::make('provinsi')
                    ->searchable(),
                TextColumn::make('daerah')
                    ->searchable(),
                TextColumn::make('jenis_waktu')
                    ->searchable(),
                TextColumn::make('lokasi_pengerjaan')
                    ->searchable(),
                TextColumn::make('gaji_dari')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('gaji_sampai')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

<?php

namespace App\Filament\Resources\LowonganKerjas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use App\Models\Provinsi;
use App\Models\Daerah;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;

class LowonganKerjaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_perusahaan')
                    ->required(),
                TextInput::make('posisi')
                    ->required(),
                Select::make('provinsi')
                    ->required()
                    ->reactive()
                    ->preload()
                    ->options([
                        Provinsi::query()
                            ->pluck('provinsi', 'id')
                            ->toArray()
                    ]),
                Select::make('daerah')
                    ->required()
                    ->options(function (callable $get) {
                        $provinsi = $get('provinsi');

                        if (! $provinsi) {
                            return [];
                        }
                        return Daerah::query()
                            ->where('id_prov2', $provinsi)
                            ->pluck('daerah', 'daerah')
                            ->toArray();
                    })
                    ->reactive()
                    ->preload(),
                Select::make('jenis_waktu')
                    ->required()
                    ->options([
                        'Full Time' => 'Full Time',
                        'Part Time' => 'Part Time',
                        'Internship' => 'Internship',
                    ]),
                Select::make('lokasi_pengerjaan')
                    ->options([
                        'On-site' => 'On-Site',
                        'Remote' => 'Remote',
                        'Hybrid' => 'Hybrid',
                    ])
                    ->required(),
                TextInput::make('gaji_dari')
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->numeric(),
                TextInput::make('gaji_sampai')
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->numeric(),
                Textarea::make('link')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}

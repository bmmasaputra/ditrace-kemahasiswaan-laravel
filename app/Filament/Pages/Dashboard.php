<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use App\Models\Fakprodi;
use Filament\Schemas\Schema;

class Dashboard extends BaseDashboard
{
    use BaseDashboard\Concerns\HasFiltersForm;

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    Select::make('Tahun')
                        ->label('Tahun Kelulusan')
                        ->options(
                            array_combine(
                                range(date('Y'), date('Y') - 10),
                                range(date('Y'), date('Y') - 10)
                            )
                        )
                        ->live(),
                    Select::make('Fakultas')
                        ->options(
                            Fakprodi::query()
                                ->distinct()
                                ->pluck('fakultas', 'fakultas')
                                ->toArray()
                        )
                        ->live()
                        ->afterStateUpdated(function () {
                            $this->js("window.location.reload()");
                        })
                ])->columns(2)->columnSpanFull(),
            ]);
    }
}

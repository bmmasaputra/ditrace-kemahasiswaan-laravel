<?php

namespace App\Filament\Resources\EvaluasiIkus\Pages;

use App\Filament\Resources\EvaluasiIkus\EvaluasiIkuResource;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\EvaluasiIkus\Widgets\IkuPekerjaan;
use App\Filament\Resources\EvaluasiIkus\Widgets\IkuWirausaha;
use App\Filament\Resources\EvaluasiIkus\Widgets\IkuStudiLanjut;
use App\Filament\Resources\EvaluasiIkus\Widgets\MetrikIku;

class ListEvaluasiIkus extends ListRecords
{
    protected static string $resource = EvaluasiIkuResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            MetrikIku::class,
            IkuPekerjaan::class,
            IkuWirausaha::class,
            IkuStudiLanjut::class,
        ];
    }
}

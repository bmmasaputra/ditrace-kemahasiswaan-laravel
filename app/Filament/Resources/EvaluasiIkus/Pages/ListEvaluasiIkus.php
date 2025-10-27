<?php

namespace App\Filament\Resources\EvaluasiIkus\Pages;

use App\Filament\Resources\EvaluasiIkus\EvaluasiIkuResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\EvaluasiIkus\Widgets\IkuPekerjaan;

class ListEvaluasiIkus extends ListRecords
{
    protected static string $resource = EvaluasiIkuResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            IkuPekerjaan::class,
        ];
    }
}

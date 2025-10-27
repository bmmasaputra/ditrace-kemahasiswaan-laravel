<?php

namespace App\Filament\Resources\EvaluasiIkus\Pages;

use App\Filament\Resources\EvaluasiIkus\EvaluasiIkuResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEvaluasiIku extends EditRecord
{
    protected static string $resource = EvaluasiIkuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

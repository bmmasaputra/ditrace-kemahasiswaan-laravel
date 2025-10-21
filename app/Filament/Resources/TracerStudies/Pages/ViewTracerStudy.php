<?php

namespace App\Filament\Resources\TracerStudies\Pages;

use App\Filament\Resources\TracerStudies\TracerStudyResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTracerStudy extends ViewRecord
{
    protected static string $resource = TracerStudyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

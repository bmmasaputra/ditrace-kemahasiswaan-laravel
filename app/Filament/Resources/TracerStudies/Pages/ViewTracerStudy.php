<?php

namespace App\Filament\Resources\TracerStudies\Pages;

use App\Filament\Resources\TracerStudies\TracerStudyResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use App\Models\TracerStudy;

class ViewTracerStudy extends ViewRecord
{
    protected static string $resource = TracerStudyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    protected function afterMount(): void
    {
        // Ensure the record is loaded
        if ($this->record) {
            // Now that the form exists, fill it with model data
            $this->form->fill($this->record->toArray());
        }
    }
}

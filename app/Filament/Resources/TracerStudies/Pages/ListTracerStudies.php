<?php

namespace App\Filament\Resources\TracerStudies\Pages;

use App\Filament\Resources\TracerStudies\TracerStudyResource;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTracerStudies extends ListRecords
{
    protected static string $resource = TracerStudyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'Kedokteran' => Tab::make()->query(fn (Builder $query) => $query->where('fakultas', 'Kedokteran')),
            'Teknik' => Tab::make()->query(fn (Builder $query) => $query->where('fakultas', 'Teknik')),
            'Pertanian' => Tab::make()->query(fn (Builder $query) => $query->where('fakultas', 'Pertanian')),
            'FMIPA' => Tab::make()->query(fn (Builder $query) => $query->where('fakultas', 'Matematika dan Ilmu Pengetahuan Alam')),
            'Ekonomi' => Tab::make()->query(fn (Builder $query) => $query->where('fakultas', 'Ekonomi')),
            'FISIP' => Tab::make()->query(fn (Builder $query) => $query->where('fakultas', 'Ilmu Sosial dan Ilmu Politik')),
            'Hukum' => Tab::make()->query(fn (Builder $query) => $query->where('fakultas', 'Hukum')),
            'FKIP' => Tab::make()->query(fn (Builder $query) => $query->where('fakultas', 'Keguruan dan Ilmu Pendidikan')),
        ];
    }
}

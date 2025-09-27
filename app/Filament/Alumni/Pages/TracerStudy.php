<?php

namespace App\Filament\Alumni\Pages;

use Filament\Support\Icons\Heroicon;
use BackedEnum;
use Filament\Pages\Page;

class TracerStudy extends Page
{
    protected string $view = 'filament.alumni.pages.tracer-study';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
}

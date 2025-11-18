<?php

namespace App\Filament\Resources\ChangePasswords\Pages;

use App\Filament\Resources\ChangePasswords\ChangePasswordResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListChangePasswords extends ListRecords
{
    protected static string $resource = ChangePasswordResource::class;

    public function mount(): void
    {
        parent::mount();

        $user = Auth::user();

        if ($user) {
            $this->redirect(
                ChangePasswordResource::getUrl('edit', ['record' => $user])
            );
        }
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}

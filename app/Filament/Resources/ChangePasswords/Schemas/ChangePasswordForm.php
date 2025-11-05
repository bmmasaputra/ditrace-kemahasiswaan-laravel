<?php

namespace App\Filament\Resources\ChangePasswords\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Facades\Filament;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\Support\Facades\Hash;
use Closure;


class ChangePasswordForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('current_password')
                    ->label('Password lama')
                    ->password()->revealable()->required()
                    ->autocomplete('current-password')
                    ->dehydrated(false)
                    ->rule(function () {
                        return function (string $attribute, $value, Closure $fail) {
                            $user = Filament::auth()->user();
                            if (! $user || ! Hash::check($value, $user->password)) {
                                $fail('Password lama tidak sesuai.');
                            }
                        };
                    }),

                TextInput::make('new_password')
                    ->label('Password baru')
                    ->password()->revealable()->required()
                    ->autocomplete('new-password')
                    ->rules(['confirmed', PasswordRule::min(8)])
                    ->dehydrated(false),

                TextInput::make('new_password_confirmation')
                    ->label('Konfirmasi password baru')
                    ->password()->revealable()->required()
                    ->autocomplete('new-password')
                    ->dehydrated(false),
            ]);
    }
}

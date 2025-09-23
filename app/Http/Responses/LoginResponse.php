<?php

namespace App\Http\Responses;

use Filament\Auth\Http\Responses\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();
        
        return match ($user->level) {
            'admin'  => redirect()->intended(filament()->getPanel('admin')->getUrl()),
            'alumni' => redirect()->intended(filament()->getPanel('alumni')->getUrl()),
            default  => redirect('/'),
        };
    }
}

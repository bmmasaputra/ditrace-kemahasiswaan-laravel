<?php

namespace App\Http\Responses;

use Filament\Auth\Http\Responses\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();

        if ($user->level == "admin") {
            return redirect()->intended(filament()->getPanel('admin')->getUrl());
        }

        if ($user->level == "alumni") {
            return redirect()->intended(filament()->getPanel('alumni')->getUrl());
        }
        
        return redirect('/');
    }
}

<?php

namespace App\Http\Responses;

use Filament\Auth\Http\Responses\Contracts\LogoutResponse as LogoutResponseContract;

class LogoutResponse implements LogoutResponseContract
{
    public function toResponse($request)
    {
        // 👇 Change this to wherever you want to go after logout
        return redirect()->to('/admin/login');
    }
}

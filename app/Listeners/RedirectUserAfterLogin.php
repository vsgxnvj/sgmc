<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class RedirectUserAfterLogin
{
    public function handle(Login $event)
    {
        $user = $event->user;

        // Store redirect path in session
        if ($user->role == 999) {
            session(['redirect_to' => '/dashboard']);
        } else {
            session(['redirect_to' => '/']);
        }
    }
}

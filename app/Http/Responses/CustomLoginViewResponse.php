<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;

class CustomLoginViewResponse implements LoginViewResponse
{
    public function toResponse($request)
    {
        // Retourne la vue d'enregistrement
        return view('auth.login');  // Assure-toi que la vue 'auth.register' existe
    }
    
}

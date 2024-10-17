<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterViewResponse;

class CustomRegisterViewResponse implements RegisterViewResponse
{
    public function toResponse($request)
    {
        // Retourne la vue d'enregistrement
        return view('auth.register');  // Assure-toi que la vue 'auth.register' existe
    }
    
}

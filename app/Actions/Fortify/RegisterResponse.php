<?php
namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        // Rediriger l'utilisateur vers une page spécifique après enregistrement
        return redirect()->route('dashboard');  // Remplace 'home' par la route que tu veux
    }
}

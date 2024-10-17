<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse;


class CustomLoginResponse implements LoginResponse
{
    public function toResponse($request)
    {
      //dd("i want a response!!");
        return redirect()->intended('/dashboard'); 
    }
}

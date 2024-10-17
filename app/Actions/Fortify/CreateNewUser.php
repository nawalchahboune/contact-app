<?php

namespace App\Actions\Fortify;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Log::info('Validation process started');
        // Validator::make($input,
        
        
        // [
        //     'name' => ['required', 'string', 'max:255'],
        //     'last_name' => ['required', 'string', 'max:255'],
        //     'email' => [
        //         'required',
        //         'string',
        //         'email',
        //         'max:255',
        //         Rule::unique(User::class),
        //     ],
        //     'password' => $this->passwordRules(),
        // ])->validate();

        // Log::info('Validation process finished');
        try {
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class),
                ],
                'password' => ['required', 'string', 'min:8', 'confirmed'],  // Correction ici
            ])->validate();
            
            
            Log::info('Validation process finished');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation errors: ', $e->errors());
            
        }
    

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}

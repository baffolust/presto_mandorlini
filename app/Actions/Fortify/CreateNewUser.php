<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     *
     * @throws ValidationException
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', 'min:5'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ], 
        [
                // NAME
                'name.required' => 'Il nome è obbligatorio',
                'name.max'      => 'Il nome non può superare i 255 caratteri',
                'name.min'      => 'Il nome deve avere almeno :min caratteri',

                // EMAIL
                'email.required' => 'L’email è obbligatoria',
                'email.email'    => 'Inserisci un indirizzo email valido',
                'email.unique'   => 'Questa email è già registrata',
                'email.max'      => 'L’email non può superare i 255 caratteri',

                // PASSWORD
                'password.required'  => 'La password è obbligatoria',
                'password.min'       => 'La password deve avere almeno :min caratteri',
                'password.confirmed' => 'Le password non coincidono',
            ]
        
        )->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}

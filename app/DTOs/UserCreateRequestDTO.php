<?php

namespace App\DTOs;

use Illuminate\Validation\Rules\Password;

class UserCreateRequestDTO extends AbstractValidatedDTO
{
    public string $email;
    public string $password;
    public string $name;

    protected function rules(): array
    {
        return [
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', Password::min(8)],
            'name' => ['required', 'string', 'between:3,50'],
        ];
    }
}

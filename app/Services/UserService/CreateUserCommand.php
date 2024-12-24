<?php

namespace App\Services\UserService;

use App\DTOs\UserCreateRequestDTO;

readonly class CreateUserCommand
{
    public UserCreateRequestDTO $dto;

    function __construct(UserCreateRequestDTO $dto)
    {
        $this->dto = $dto;
    }
}

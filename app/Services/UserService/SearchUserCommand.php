<?php

namespace App\Services\UserService;

use App\DTOs\UserSearchRequestDTO;

readonly class SearchUserCommand
{
    public UserSearchRequestDTO $dto;
    public int $perPage;

    function __construct(UserSearchRequestDTO $dto, int $perPage = 10)
    {
        $this->dto = $dto;
        $this->perPage = $perPage;
    }
}

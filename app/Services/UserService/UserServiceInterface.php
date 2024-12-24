<?php

namespace App\Services\UserService;

use App\DTOs\UserCreateRequestDTO;
use App\DTOs\UserCreateResponseDTO;
use App\DTOs\UserSearchRequestDTO;
use App\DTOs\UserSearchResponseDTO;

interface UserServiceInterface
{
    public function createUser(UserCreateRequestDTO $requestDTO): UserCreateResponseDTO;
    public function searchUser(UserSearchRequestDTO $requestDTO): UserSearchResponseDTO;
}

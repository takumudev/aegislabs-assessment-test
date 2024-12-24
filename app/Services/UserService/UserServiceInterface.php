<?php

namespace App\Services\UserService;

use App\DTOs\UserCreateResponseDTO;
use App\DTOs\UserSearchResponseDTO;

interface UserServiceInterface
{
    public function createUser(CreateUserCommand $cmd): UserCreateResponseDTO;
    public function searchUser(SearchUserCommand $cmd): UserSearchResponseDTO;
}

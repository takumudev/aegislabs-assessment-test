<?php

namespace App\DTOs;

class UserSearchResponseDTO extends AbstractDTO
{
    public int $page;
    public array $users;
}

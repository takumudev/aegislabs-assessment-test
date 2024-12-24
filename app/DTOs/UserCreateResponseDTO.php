<?php

namespace App\DTOs;

use WendellAdriel\ValidatedDTO\Attributes\Cast;
use WendellAdriel\ValidatedDTO\Casting\CarbonCast;

class UserCreateResponseDTO extends AbstractDTO
{
    public int $id;
    public string $email;
    public string $name;
    #[Cast(CarbonCast::class)]
    public string $created_at;
}

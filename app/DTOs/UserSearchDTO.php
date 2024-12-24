<?php

namespace App\DTOs;

use WendellAdriel\ValidatedDTO\Attributes\Cast;
use WendellAdriel\ValidatedDTO\Casting\CarbonCast;

class UserSearchDTO extends AbstractDTO
{
    public int $id;
    public string $email;
    public string $name;
    #[Cast(CarbonCast::class)]
    public string $created_at;
    public int $orders_count;
}

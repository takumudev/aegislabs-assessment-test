<?php

namespace App\DTOs;

use WendellAdriel\ValidatedDTO\Concerns\EmptyCasts;
use WendellAdriel\ValidatedDTO\Concerns\EmptyDefaults;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

abstract class AbstractValidatedDTO extends ValidatedDTO
{
    use EmptyCasts;
    use EmptyDefaults;

    public bool $lazyValidation = true;
}

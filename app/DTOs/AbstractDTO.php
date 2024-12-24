<?php

namespace App\DTOs;

use WendellAdriel\ValidatedDTO\Concerns\EmptyCasts;
use WendellAdriel\ValidatedDTO\Concerns\EmptyDefaults;
use WendellAdriel\ValidatedDTO\Concerns\EmptyRules;
use WendellAdriel\ValidatedDTO\ResourceDTO;

abstract class AbstractDTO extends ResourceDTO
{
    use EmptyCasts;
    use EmptyDefaults;
    use EmptyRules;

    public bool $lazyValidation = true;
}

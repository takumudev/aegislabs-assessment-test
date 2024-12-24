<?php

namespace App\DTOs;

use WendellAdriel\ValidatedDTO\Attributes\DefaultValue;

class UserSearchRequestDTO extends AbstractValidatedDTO
{
    public ?string $search;
    #[DefaultValue(1)]
    public ?int $page;
    #[DefaultValue('created_at')]
    public ?string $sort_by;

    protected function rules(): array
    {
        return [
            'search' => ['nullable', 'string'],
            'page' => ['nullable', 'integer', 'min:1'],
            'sort_by' => ['nullable', 'string', 'in:name,email,created_at']
        ];
    }

    public function messages(): array
    {
        return [
            'sort_by.in' => 'The sort_by must be one of the following: name, email, created_at'
        ];
    }
}

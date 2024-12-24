<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'name' => fake()->name(),
            'active' => true,
        ];
    }

    public function inactive(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'active' => false,
            ];
        });
    }
}

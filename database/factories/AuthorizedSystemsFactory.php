<?php

namespace Database\Factories;

use App\Models\AuthorizedSystems;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<AuthorizedSystems>
 */
class AuthorizedSystemsFactory extends Factory
{
    protected $model = AuthorizedSystems::class;

    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'administrator_id' => User::factory(),
            'name' => fake()->name(),
            'description' => fake()->text(),
            'token' => implode('.', [
                base64_encode(Str::random(32)),
                base64_encode(Str::random(64)),
                base64_encode(Str::random(32))
            ]),
            'ip_address' => fake()->ipv4(),
            'active' => fake()->boolean(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Responder>
 */
class ResponderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ip' => fake()->ipv4,
            'uuid' => fake()->uuid,
            'utm_source' => fake()->text(5),
            'utm_medium' => fake()->text(5),
            'utm_campaign' => fake()->text(5),
            'user_agent' => fake()->userAgent(),
            'finger_print' => Str::slug(fake()->text(10)),
        ];
    }
}

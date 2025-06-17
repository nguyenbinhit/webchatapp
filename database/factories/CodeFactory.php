<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Code>
 */
class CodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->unique()->regexify('[A-Z]{3}-[0-9]{4}'), // Example: ABC-1234
            'note' => fake()->sentence(6, true),
            'status' => 0, // 0: inactive, 1: active
        ];
    }
}

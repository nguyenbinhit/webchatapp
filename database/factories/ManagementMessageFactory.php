<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ManagementMessage>
 */
class ManagementMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_url' => fake()->imageUrl(640, 480, 'business', true, 'Management Message'),
            'account' => fake()->randomElement(['John', 'David']),
            'content' => fake()->paragraph(3, true),
            'status' => fake()->randomElement([0, 1]), // 0:
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sender_id' => 0,
            'receiver_id' => 0,
            'content' => fake()->text(200),
            'is_read' => fake()->boolean(),
            'custom_time' => null,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\ManagementMessage;
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
            'management_message_id' => fake()->randomElement(ManagementMessage::pluck('id')->toArray()),
            'content' => fake()->text(200),
        ];
    }
}

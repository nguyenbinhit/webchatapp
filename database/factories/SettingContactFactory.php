<?php

namespace Database\Factories;

use App\Models\Code;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SettingContact>
 */
class SettingContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3, true),
            'phone' => fake()->phoneNumber(),
            'image_url' => fake()->imageUrl(640, 480, 'business', true, 'Contact Image'),
            'main_account' => fake()->randomElement(['John', 'David']),
            'code' => fake()->randomElement(Code::pluck('code')->toArray()),
            'code_id' => fake()->randomElement(Code::pluck('id')->toArray()),
            'description' => fake()->paragraph(2, true),
            'key_word' => fake()->words(3, true),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Enums\Genre;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->realTextBetween(10, 100),
            'Genre' => fake()->randomElement(Genre::cases()),
            'catchphrase' => fake()->realText(35),
            'introduction' => fake()->realText(),
        ];
    }
}

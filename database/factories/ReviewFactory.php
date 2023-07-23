<?php

namespace Database\Factories;

use App\Enums\Status;
use App\Models\Story;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
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
            'story_id' => Story::factory(),
            'title' => fake()->realTextBetween(10, 100),
            'body' => fake()->realTextBetween(300, 3000),
            'Status' => Status::Enable,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Enums\Status;
use App\Models\Episode;
use App\Models\Story;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Episode>
 */
class EpisodeFactory extends Factory
{
    protected $model = Episode::class;

    private static string $storyId = '';
    private static int $episodeOrder = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'story_id' => Story::factory(),
            'title' => fake()->realTextBetween(10, 100),
            'body' => fake()->realTextBetween(3000, 6000),
            'order' => self::$episodeOrder++,
            'Status' => Status::Enable,
        ];
    }

    /**
     * @comment story_id毎にorderの値を連番にする
     */
    public function configure()
    {
        return $this->afterMaking(function (Episode $episode) {
        })->afterCreating(function (Episode $episode) {
            if (self::$storyId !== $episode->story_id) {
                self::$storyId = $episode->story_id;
                self::$episodeOrder = 1;
            }
        });
    }
}

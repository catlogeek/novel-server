<?php

namespace Database\Factories;

use App\Models\Story;
use App\Models\StoryTag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoryTag>
 */
class StoryTagFactory extends Factory
{
    protected $model = StoryTag::class;

    private static string $storyId = '';
    private static int $order = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'story_id' => Story::factory(),
            'text' => fake()->word(),
            'order' => self::$order++,
        ];
    }

    /**
     * @comment story_id毎にorderの値を連番にする
     */
    public function configure()
    {
        return $this->afterMaking(function (StoryTag $storyTag) {
        })->afterCreating(function (StoryTag $storyTag) {
            if (self::$storyId !== $storyTag->story_id) {
                self::$storyId = $storyTag->story_id;
                self::$order = 1;
            }
        });
    }
}

<?php

namespace Database\Seeders\Development;

use App\Models\Episode;
use App\Models\Story;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stories = Story::query()->oldest()->get();

        foreach ($stories as $story) {
            Episode::factory(fake()->numberBetween(1, 10))->state([
                'story_id' => $story->id,
            ])->create();
        }
    }
}

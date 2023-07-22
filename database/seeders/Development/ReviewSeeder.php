<?php

namespace Database\Seeders\Development;

use App\Models\Review;
use App\Models\Story;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stories = Story::query()->oldest()->get();

        foreach ($stories as $story) {
            Review::factory(fake()->numberBetween(0, 2))->state([
                'story_id' => $story->id,
            ])->create();
        }
    }
}

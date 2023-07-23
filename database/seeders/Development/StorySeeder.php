<?php

namespace Database\Seeders\Development;

use App\Models\Episode;
use App\Models\Review;
use App\Models\Story;
use App\Models\StoryTag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::query()->oldest()->get();

        Story::factory(500)
            ->recycle($users)
            ->has(Episode::factory(10))
            ->has(StoryTag::factory(5))
            ->has(Review::factory(5))
            ->create();
    }
}

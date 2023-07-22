<?php

namespace Database\Seeders\Development;

use App\Models\Comment;
use App\Models\Episode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $episodes = Episode::query()->oldest()->get();

        foreach ($episodes as $episode) {
            Comment::factory(fake()->numberBetween(0, 3))->state([
                'episode_id' => $episode->id,
            ])->create();
        }
    }
}

<?php

namespace Database\Seeders\Development;

use App\Models\Comment;
use App\Models\Episode;
use App\Models\User;
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
        $users = User::query()->oldest()->get();

        foreach ($episodes as $episode) {
            Comment::factory(5)
                ->state(function () use ($episode, $users) {
                    return [
                        'episode_id' => $episode->id,
                        'user_id' => fake()->randomElement($users)->id,
                    ];
                })
                ->create();
        }
    }
}

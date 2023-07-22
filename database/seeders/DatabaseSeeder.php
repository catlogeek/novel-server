<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Database\Seeders\Development\CommentSeeder;
use Database\Seeders\Development\EpisodeSeeder;
use Database\Seeders\Development\NoteSeeder;
use Database\Seeders\Development\ReviewSeeder;
use Database\Seeders\Development\StorySeeder;
use Database\Seeders\Development\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        fake()->seed(41);

        $this->call([
            // 必ず最初
            UserSeeder::class,

            // Userに紐づく
            StorySeeder::class,
            NoteSeeder::class,

            // Storyに紐づく
            EpisodeSeeder::class,
            ReviewSeeder::class,

            // Episodeに紐づく
            CommentSeeder::class,
        ]);
    }
}

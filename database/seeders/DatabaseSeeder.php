<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Development\CommentSeeder;
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
        $this->call([
            UserSeeder::class,
            StorySeeder::class,
            CommentSeeder::class,
        ]);
    }
}

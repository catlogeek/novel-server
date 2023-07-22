<?php

namespace Database\Seeders\Development;

use App\Models\Story;
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

        foreach ($users as $user) {
            Story::factory(fake()->numberBetween(0, 5))->state([
                'user_id' => $user->id,
            ])->create();
        }
    }
}

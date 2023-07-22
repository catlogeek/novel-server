<?php

namespace Database\Seeders\Development;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::query()->oldest()->get();

        foreach ($users as $user) {
            Note::factory(fake()->numberBetween(0, 10))->state([
                'user_id' => $user->id,
            ])->create();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Fahd shaykh',
            'email' => 'fadesheikh@user.com',
            'password' => bcrypt('fade1234'),
            'email_verified_at' => now(),
        ]);

        \App\Models\Project::factory(5)->create()->each(function ($project) {
            $project->tasks()->saveMany(\App\Models\Task::factory(10)->make());
        });
    }
}

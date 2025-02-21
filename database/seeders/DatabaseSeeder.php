<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //User::factory(3)->create();
        echo "Memory before seeding: " . memory_get_usage() . " bytes\n";

        Task::factory()->count(10)->create();

        echo "Memory after seeding: " . memory_get_usage() . " bytes\n";
    }
}

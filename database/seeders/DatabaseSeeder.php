<?php

namespace Database\Seeders;

use App\Models\student;
use App\Models\teacher;
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
        // User::factory(10)->create();
        student::factory(10)->create();
        teacher::factory(5)->create();
    }
}

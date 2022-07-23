<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(2)
            ->create();
        Subject::factory()
            ->has(Category::factory()
                ->count(10))
            ->count(10)
            ->create();
    }
}

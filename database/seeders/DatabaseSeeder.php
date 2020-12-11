<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Guild;
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
        //User::factory(10)->create();
        Guild::factory(5)->create();
        Article::factory(60)->create();
    }
}

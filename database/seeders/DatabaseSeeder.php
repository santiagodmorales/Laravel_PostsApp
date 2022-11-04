<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{comment, image, Post, User};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Post::factory(30)->create();
        comment::factory(60)->create();
        image::factory(20)->create();
    }
}

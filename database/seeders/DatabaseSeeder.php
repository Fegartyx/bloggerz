<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Test User',
            'username' => 'test-user',
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);

        Category::create([
            'name' => 'Mobile Programming',
            'slug' => 'mobile-programming',
        ]);

        \App\Models\User::factory(5)->create();

        Post::factory(40)->create();

        Post::create([
            'title' => 'Judul Pertama',
            'category_id' => 2,
            'user_id' => 1,
            'slug' => 'judul-pertama',
            'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
            'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt, accusantium veniam, totam illo culpa, exercitationem quidem eos eius sapiente quas asperiores deleniti natus ipsam officiis est debitis? Quo, quos quia.</p>',
        ]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 20 users with verified email
        for ($i=1; $i <= 20; $i++) { 
            \App\Models\User::factory()->create([
                'email' => "verified" . $i . "@gmail.com",
            ]);
        }

        $users = User::pluck('id')->toArray();
        // Create 200 posts to random user
        for ($i=1; $i <= 200; $i++) { 
            \App\Models\Post::factory()->create([
                'user_id' => $users[array_rand($users)],
            ]);
        }

        $posts = Post::pluck('id')->toArray();
        // Create 600 comments to random user and random post
        for ($i=1; $i <= 600; $i++) {
            \App\Models\Comment::factory()->create([
                'user_id' => $users[array_rand($users)],
                'post_id' => $posts[array_rand($posts)],
            ]);
        }

        // create 10 unverified user
        for ($i=1; $i <= 10; $i++) { 
            \App\Models\User::factory()->create([
                'email_verified_at' => null,
                'email' => "unverified" . $i . "@gmail.com",
            ]);
        }

        
    }
}

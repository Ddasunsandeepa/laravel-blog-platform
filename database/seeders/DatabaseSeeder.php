<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Faker\Guesser\Name;
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
            'name' =>'Test user',
            'email' => 'test@gmail.com'
        ]);

        $categories = ['Technoloy','Health','Science','sports', 'Politics', 'Entertainment',];

        foreach($categories as $category){
            Category::create(['name'=>$category]);
        }

        Post::factory(100)->create();

        
    }
}

<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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

        $users =  User::factory()->create([
            'name'=>'adam'
        ]);
        Post::truncate();
        Category::truncate();
        User::truncate();

        $categories = Category::factory(15)->create();

        $users =  User::factory(10)->create();

        $users->each(function($user) use ($categories){
            $categories->each(function($category) use ($user){
                Post::factory()->create([
                    'user_id'       =>  $user->id,
                    'category_id'   =>  $category->id,
                ]);
            });
        });

    }
}

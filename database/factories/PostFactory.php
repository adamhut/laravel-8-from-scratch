<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words('5',true);
        return [
            //
            'category_id' => Category::factory(),
            'user_id'   => User::factory(),
            'slug' => Str::slug($title),
            'title' => $title,
            'excerpt'=>  $this->faker->words('5',true),
            'body' => $this->faker->paragraphs(3,true),

        ];
    }
}
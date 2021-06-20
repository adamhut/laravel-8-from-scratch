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
        $title = $this->faker->sentence();
        return [
            //
            'title'         => $title,
            'category_id'   => Category::factory(),
            'user_id'       => User::factory(),
            'slug'          => Str::slug($title),
            'excerpt'       => '<p>'.implode('</p><p>',$this->faker->paragraphs(2)). '</p>',
            // 'body'          => $this->faker->paragraphs(3,true),
            'body'          => '<p>' . implode('</p><p>', $this->faker->paragraphs(10)) . '</p>',
        ];
    }
}

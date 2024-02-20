<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 * 
 */
class PostFactory extends Factory
{

    protected $model = Post::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition():array
    {
        return [
            'image' => $this->faker->imageUrl(), // You might want to use appropriate faker method for images
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

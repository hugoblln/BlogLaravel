<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->text(),
            'user_id' => 1
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($post)
        {
            $tags = Tag::inRandomOrder()->take(rand(1,3))->pluck('id');
            $post->tags()->attach($tags);

        });
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostsTags>
 */
class PostsTagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_id' => Post::random(1)->pluck('id')->toArray(),
            'user_id' => User::random(1)->pluck('id')->toArray(),
            'tag_slug' => $this->faker->word,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StatBlank>
 */
class StatBlankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "blank_id" => \App\Models\Blank::pluck("id")
                ->random(1)
                ->toArray()[0],
            "author_id" => \App\Models\User::pluck("id")
                ->random(1)
                ->toArray()[0],
            "finish" => rand(0, 1),
            "dificult" => rand(56, 100),
            "useful" => rand(60, 100),
            "full" => rand(1, 100),
            "understand" => rand(60, 100),
            "detail" => rand(61, 100),
            "popular" => rand(61, 100),
            "potential_ideas" => rand(1, 10),
            "timer" => rand(100, 1000),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use DB;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $lng = \App\Models\Language::pluck("language_code")
            ->random(1)
            ->toArray();
        $autor = \App\Models\User::pluck("id")
            ->random(1)
            ->toArray();
        $name = DB::connection("ep")
            ->table("types")
            ->where("priv", "=", 100)
            ->get()
            ->random(1);
        return [
            "name" => $name[0]->text,
            "lang" => $lng[0],
            "author_id" => $autor[0],
            "status" => rand(0, 2),
            "abv" => $name[0]->text,
            "description" => $this->faker->paragraph,
        ];
    }
}

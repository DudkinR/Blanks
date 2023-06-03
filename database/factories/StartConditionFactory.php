<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use DB;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StartCondition>
 */
class StartConditionFactory extends Factory
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

        $epPosts = DB::connection("ep")
            ->table("bp_text_tip")
            ->where("porydok", "=", 0)
            ->get()
            ->random(1);

        return [
            "author_id" => $autor[0],
            "status" => rand(0, 2),
            "lang" => $lng[0],
            "content" => $epPosts[0]->text,
        ];
    }
}

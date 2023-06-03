<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use DB;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
        if (
            \App\Models\Category::where("author_id", "=", $autor[0])->count() >
            1
        ) {
            $parent = \App\Models\Category::where("author_id", "=", $autor[0])
                ->pluck("id")
                ->random(1)
                ->toArray();
            $prnt = $parent[0];
        } else {
            $prnt = 0;
        }
        $image = \App\Models\Icon::pluck("id")
            ->random(1)
            ->toArray();
        $name = DB::connection("ep")
            ->table("types")
            ->where("priv", ">", 0)
            ->get()
            ->random(1);
        return [
            //generate category
            "name" => $name[0]->text,
            "lang" => $lng[0],
            "author_id" => $autor[0],
            "slug" => $this->faker->slug,
            "parent_id" => $prnt,
            "description" => $name[0]->text,
            "image" => $image[0],
            "status" => rand(0, 2),
        ];
    }
}

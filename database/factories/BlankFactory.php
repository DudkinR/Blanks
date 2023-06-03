<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use DB;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blank>
 */
class BlankFactory extends Factory
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
        $ver = rand(0, 100);
        if ($ver > 90) {
            if (
                \App\Models\Blank::where("author_id", "=", $autor[0])->count() >
                1
            ) {
                $parent = \App\Models\Blank::where("author_id", "=", $autor[0])
                    ->pluck("id")
                    ->random(1)
                    ->toArray();
                $prnt = $parent[0];
            } else {
                $prnt = 0;
            }
        } else {
            $prnt = 0;
        }
        $name = DB::connection("ep")
            ->table("bp_tip")
            ->where("npp", "=", 1)
            ->get()
            ->random(1);
        $tcheme = DB::connection("ep")
            ->table("types")
            ->where("ind", "=", $name[0]->system)
            ->get();
        return [
            "lang" => $lng[0],
            "status" => rand(0, 2),
            "author_id" => $autor[0],
            "parent_id" => $prnt,
            "name" => $name[0]->name,
            "tcheme" => $tcheme[0]->text,
        ];
    }
}

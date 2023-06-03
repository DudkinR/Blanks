<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use DB;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $autor = \App\Models\User::pluck("id")
            ->random(1)
            ->toArray();
        $ver = rand(0, 100);
        if ($ver > 90) {
            if (
                \App\Models\Item::where("author_id", "=", $autor[0])->count() >
                1
            ) {
                $parent = \App\Models\Item::where("author_id", "=", $autor[0])
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
            ->table("types")
            ->where("priv", "=", 11)
            ->get()
            ->random(1);
        $text = DB::connection("ep")
            ->table("bp_text_tip")
            ->where("porydok", "!=", 0)
            ->get()
            ->random(1);
        $name = DB::connection("ep")
            ->table("types")
            ->where("priv", "=", 100)
            ->get()
            ->random(1);
        return [
            "parent_id" => $prnt,
            "name" => $name[0]->text,
            "author_id" => $autor[0],
            "status" => rand(0, 2),
            "content" => $text[0]->text,
            "real_time" => rand(5, 180),
            "avoid_time" => rand(5, 180),
        ];
    }
}

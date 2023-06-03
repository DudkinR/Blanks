<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // generate 10 rows in table posts_tags
        for($i=0;$i<100;$i++){
            $post_id = \App\Models\Post::all()->random()->id;
            $user_id = \App\Models\User::all()->random()->id;
            //random word   
            $tag_slug = \Illuminate\Support\Str::random(10);
            \App\Models\PostsTags::create([
                'post_id' => $post_id,
                'user_id' => $user_id,
                'tag_slug' => $tag_slug,
            ]);
        }
    }
}

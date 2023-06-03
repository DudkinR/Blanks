<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //generate pivot table data post_tag
        $posts = \App\Models\Post::all();
        $tags = \App\Models\Tag::all();
        foreach ($posts as $post) {
            //Bad Method Call: Did you mean App\Models\Post::getChanges() ? 
           $post->tags()->attach($tags->random(3)->pluck('id')->toArray());

        }


    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Item::factory()->count(1000)->create();
        $items=\App\Models\Item::all();
        foreach($items as $item){
            if(\App\Models\Position::where('author_id','=',$item->author_id)->count()>0){
                $position=\App\Models\Position::where('author_id','=',$item->author_id)->pluck('id')->random(1)->toArray();
                $item->positions()->attach($position);
             }
        }
    }
}

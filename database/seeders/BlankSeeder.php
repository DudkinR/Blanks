<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Blank::factory()->count(100)->create();
        for($i=0;$i<10;$i++){
        $allblanks=\App\Models\Blank::all();
    foreach($allblanks as $blank){
            if($max=\App\Models\Item::where('author_id','=',$blank->author_id)->count()>0){
            $rand=rand(1,$max);    
            $items=\App\Models\Item::where('author_id','=',$blank->author_id)->pluck('id')->random($rand)->toArray();
            $blank->items()->attach($items);
            }
             if($max=\App\Models\Category::where('author_id','=',$blank->author_id)->count()>0){
                $rand=rand(1,$max);  

            $cats=\App\Models\Category::where('author_id','=',$blank->author_id)->pluck('id')->random($rand)->toArray();
            $blank->categories()->attach($cats);
             }
             if($max=\App\Models\StartCondition::where('author_id','=',$blank->author_id)->count()>0){
                $rand=rand(1,$max);  
            $startconditions=\App\Models\StartCondition::where('author_id','=',$blank->author_id)->pluck('id')->random($rand)->toArray();
            $blank->startconditions()->attach($startconditions);
             }
             if($max=\App\Models\Position::where('author_id','=',$blank->author_id)->count()>0){
                $rand=rand(1,$max);  
                $position=\App\Models\Position::where('author_id','=',$blank->author_id)->pluck('id')->random($rand)->toArray();
                $blank->positions()->attach($position);
             }

        }
    }
    }
}

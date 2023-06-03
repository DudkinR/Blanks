<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LanguageSeeder::class,
            RoleSeeder::class,
            CountrySeeder::class,
            IconsSeeder::class,
            UserSeeder::class,
           // PositionSeeder::class,
            //CategorySeeder::class,
           // ItemSeeder::class,
           // StartConditionSeeder::class,
           // BlankSeeder::class,
          
          //  PostsTagsSeeder::class,
          //  CategorySeeder::class,
  
         ]);
        //  \App\Models\User::factory(10)->create();
        // \App\Models\Position::factory(10)->create();
    }
}

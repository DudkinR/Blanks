<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                "name" => "admin",
                "email" => "admin@admin",
                "email_verified_at" => now(),
                "password" => bcrypt("Qwerty123"), // password
                "remember_token" => Str::random(10),
            ],
            [
                "name" => "user",
                "email" => "user@user",
                "email_verified_at" => now(),
                "password" => bcrypt("Qwerty123"), // password
                "remember_token" => Str::random(10),
            ],

            [
                "name" => "user-2",
                "email" => "user2@user",
                "email_verified_at" => now(),
                "password" => bcrypt("Qwerty123"), // password
                "remember_token" => Str::random(10),
            ],
        ];
        if (
            \App\Models\User::where("email", "=", "admin@admin")->count() == 0
        ) {
            \App\Models\User::insert($admin);
        }
        \App\Models\User::factory(100)->create();
        $users = \App\Models\User::all();
        foreach ($users as $user) {
            if ($user->profile == null) {
                $user->profile()->create([
                    "user_id" => $user->id,
                    "money" => 0,
                    "image" => "",
                    "size" => 1,
                    "color" => "#000000",
                    "background" => "#ffffff",
                    "lpanel" => 1,
                    "rpanel" => 1,
                    "tpanel" => 1,
                    "bpanel" => 1,
                ]);
            }
            if ($user->name !== "admin") {
                $user->roles()->detach();
            }
            $user->roles()->attach(1);
        }
    }
}

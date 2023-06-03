<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[1=>"user",2=>"admin",3=>"superuser",4=>"corparate",5=>"guest"];
        Foreach($roles as $key=>$val){
           if($r=\App\Models\Role::find($key)){
            if($r->name!==$val)
            $r->name=$val;
             $r->updated_at=now();
            $r->save();

           }
           else{
            $r= new \App\Models\Role;
            $r->insert([
                'id'=>$key,
                'name'=>$val,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
           }

        }
    }
}

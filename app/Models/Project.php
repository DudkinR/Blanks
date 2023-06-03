<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function author()
    {
        return $this->hasOne(User::class, "id", "author_id");
    }
    public function blanks()
    {
        return $this->belongsToMany(
            Blank::class,
            "project_blank",
            "project_id",
            "blank_id",
          //  "author_id",
        )->withPivot(["id","order", "type", "author_id","created_at", "updated_at"])
        ->orderByPivot('order','asc');
    }
    
    public function categories(){
        return $this->belongsToMany(
            Category::class,
            "project_id",
            "category_id"
        );
    }
    public function workbBanks(){

    }
    public function works(){
       return $this->belongsToMany( Work ::class,  "work_project", "project_id") ->orderByPivot('order','asc')
       ->withPivot(["id","order", "type", "project_id", "blank_id", "user_id", "item_id"]);
    }
    public function hasWork($blank)
    {
       
    }
}

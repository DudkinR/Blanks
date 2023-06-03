<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $table='work_project';
    protected $fillable=['order', 'project_id', 'blank_id', 'user_id', 'type', 'item_id'];
    public function projects(){
        return $this->belongsToMany( Project ::class,  "work_project", "project_id")
        ->withPivot(["id","order", "type", "project_id", "blank_id", "user_id", "item_id", "created_at", "updated_at"]);
     }

}

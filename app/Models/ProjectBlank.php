<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectBlank extends Model
{
    use HasFactory;
    //project_blank
    protected $table = "project_blank";
    //  `order`,`type`,`project_id`,`blank_id`, `created_at`,`updated_at`
    protected $fillable = ["order", "type","author_id", "project_id", "blank_id"];
    public function project()
    {
        return $this->belongsTo(Project::class)
            // with pivot order and type
            ->withPivot("order", "type","author_id");
    }
    public function blank()
    {
        return $this->belongsTo(Blank::class)
            // with pivot order and type
            ->withPivot("order", "type","author_id");
    }
}

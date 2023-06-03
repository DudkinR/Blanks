<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;
    // table
    protected $table = "ideas";
    // fillable
    protected $fillable = ["content", "author_id", "category", "status"];

    // как выводить orderby по умолчанию
}

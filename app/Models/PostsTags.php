<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsTags extends Model
{
    use HasFactory;
    public $table='posts_tags';
    public $fillable=['post_id','user_id','tag_slug'];
}

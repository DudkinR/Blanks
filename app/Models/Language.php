<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    public $table='languages';
    public $fillable = [
        'language_code',
        'language_name', 
        'code',
    ];

}

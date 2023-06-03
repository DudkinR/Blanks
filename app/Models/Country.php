<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    // columns in the table
    public $table='country';
    public $fillable = [
        'enabled',
        'name', 
        'code31',
        'code21',
        'name_official',
        'latitude',
        'longitude',
        'zoom',
        'un',
        'code',
    ];

}

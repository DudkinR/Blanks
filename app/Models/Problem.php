<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;
    protected $table='problems';
    protected $fillable=[
        
        'status',
       'content',
       'author_id',
       'desition',

    ];
    public function items()
    {
        return $this->belongsToMany(Item::class, 'problem_item', 'problem_id', 'item_id');
    }
    public function blanks()
    {
        return $this->belongsToMany(Blank::class, 'problem_blank', 'problem_id', 'blank_id');
    }
    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}

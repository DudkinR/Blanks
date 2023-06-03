<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finish extends Model
{
    use HasFactory;
    protected $table='finish_conditions';
    protected $fillable=[
    'author_id',
    'status',
    'lang',
    'content'];
    
    public function language()
    {
        return $this->belongsTo(Language::class,'lang', 'language_code');
    }
    public function blanks()
    {
        return $this->belongsToMany(Blank::class, 'blank_finish', 'condition_id', 'blank_id')->withPivot(["id","order"])
        ->orderBy("order", "ASC");
    }
    public function items()
    {
        return $this->belongsToMany(StartCondition::class, 'item_finish', 'condition_id', 'item_id')->withPivot(["id","order"])
        ->orderBy("order", "ASC");
    }
    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}

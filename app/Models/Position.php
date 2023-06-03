<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = "positions";
    protected $fillable = [
        "name",
        "author_id",
        "status",
        "lang",
        "abv",
        "description",
    ];
    public function language()
    {
        return $this->belongsTo(Language::class, "lang", "language_code");
    }
    public function blanks()
    {
        return $this->belongsToMany(
            Blank::class,
            "blank_position",
            "position_id",
            "blank_id"
        );
    }
    public function items()
    {
        return $this->belongsToMany(
            Position::class,
            "position_item",
            "position_id",
            "item_id"
        );
    }
    public function control_items()
    {
        return $this->belongsToMany(
            Position::class,
            "control_item",
            "position_id",
            "item_id"
        );
    }
    // author
    public function author()
    {
        return $this->hasOne(User::class, "id", "author_id");
    }
}

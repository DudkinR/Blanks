<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = "items";
    protected $fillable = [
        "parent_id",
        "name",
        "author_id",
        "status",
        "content",
        "real_time", // sek
        "avoid_time", // sek
    ];
    public function blanks()
    {
        return $this->belongsToMany(
            Blank::class,
            "blank_item",
            "item_id",
            "blank_id"
        );
    }
    public function order($blank_id)
    {
        return $this->hasOne(Blank::class, "blank_item", "item_id", "blank_id");
    }
    public function items()
    {
        return $this->belongsToMany(
            Item::class,
            "item_item",
            "parent_id",
            "item_id"
        )
            ->withPivot(["id", "order"])
            ->where("items.parent_id", "!=", 0)
            ->orderBy("order", "ASC");
    }
    public function positions()
    {
        return $this->belongsToMany(
            Position::class,
            "position_item",
            "item_id",
            "position_id"
        );
    }
    public function control_positions()
    {
        // belongstomany control_item table with pivot position_id item_id
        return $this->belongsToMany(
            Position::class,
            "control_item",
            "item_id",
            "position_id"
        );
    }
    public function problems()
    {
        return $this->belongsToMany(
            Problem::class,
            "problem_item",
            "item_id",
            "problem_id"
        );
    }
    public function startconditions()
    {
        return $this->belongsToMany(
            StartCondition::class,
            "item_start",
            "item_id",
            "condition_id"
        );
    }
    public function author()
    {
        return $this->hasOne(User::class, "id", "author_id");
    }
    protected function withDefault($relations)
    {
        $relations[] = "blanks";
        $relations[] = "positions";
        $relations[] = "language";
        $relations[] = "items";
        $relations[] = "order";
        $relations[] = "problems";
        $relations[] = "startconditions";
        return $relations;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blank extends Model
{
    use HasFactory;
    // $table
    protected $table = "blanks";
    // $fillable
    protected $fillable = [
        "lang",
        "color",
        "author_id",
        "status",
        "parent_id",
        "name",
        "tcheme",
        "description",
    ];
    //belongtomany relationship with cattegory
    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            "blank_category",
            "blank_id",
            "category_id"
        );
    }
    // author_id
    public function author()
    {
        return $this->belongsTo(User::class, "author_id", "id");
    }
    public function language()
    {
        return $this->belongsTo(Language::class, "lang", "language_code");
    }
    public function items()
    {
        return $this->belongsToMany(
            Item::class,
            "blank_item",
            "blank_id",
            "item_id"
        )
            ->withPivot(["id", "order"])
            ->where("items.parent_id", "=", 0)
            ->orderBy("order", "ASC");
    }
    public function positions()
    {
        return $this->belongsToMany(
            Position::class,
            "blank_position",
            "blank_id",
            "position_id"
        );
    }
    public function startconditions()
    {
        return $this->belongsToMany(
            StartCondition::class,
            "blank_condition",
            "blank_id",
            "condition_id"
        )
            ->withPivot(["id", "order"])
            ->orderBy("order", "ASC");
    }
    public function finishconditions()
    {
        return $this->belongsToMany(
            Finish::class,
            "blank_finish",
            "blank_id",
            "condition_id"
        )
            ->withPivot(["id", "order"])
            ->orderBy("order", "ASC");
    }
    public function problems()
    {
        return $this->belongsToMany(
            Problem::class,
            "problem_blank",
            "blank_id",
            "problem_id"
        );
    }
    public function blanks()
    {
        return $this->belongsToMany(
            Blank::class,
            "blank_blank",
            "parent_id",
            "blank_id"
        )
            ->where("blanks.parent_id", "!=", 0)
            ->orderBy("order", "ASC");
    }
    public function examples()
    {
        return $this->belongsToMany(
            Example::class,
            "blank_example",
            "blank_id",
            "example_id"
        );
    }
    public function projects()
    {
        return $this->belongsToMany(
            Project::class,
            "project_blank",
            "blank_id",
            "project_id",
            "author_id",
        )->withPivot(["id", "order", "type", "author_id","created_at", "updated_at"]);
    }
    public function order($project_id)
    {
        return $this->hasOne(
            Project::class,
            "project_blank",
            "blank_id",
            "project_id"
        );
    }
    protected function withDefault($relations)
    {
        $relations[] = "blanks";
        $relations[] = "positions";
        $relations[] = "categories";
        $relations[] = "language";
        $relations[] = "items";
        $relations[] = "order";
        $relations[] = "projects";
        $relations[] = "problems";
        return $relations;
    }
    public function stamps()
    {
        return $this->belongsToMany(
            Stamp::class,
            "blank_stamp",
            "blank_id",
            "stamp_id"
        );
    }
}

//

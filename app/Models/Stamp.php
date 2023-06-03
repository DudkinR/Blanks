<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stamp extends Model
{
    use HasFactory;
    protected $table = "stamps";
    protected $fillable = ["content", "lang"];
    public function blanks()
    {
        return $this->belongsToMany(
            Blank::class,
            "blank_stamp",
            "stamp_id",
            "blank_id"
        );
    }
    public function author()
    {
        return $this->belongsTo(User::class, "users", "author_id", "id");
    }
    public function getNewStamps($project_id, $blank_id, $order)
    {
        return $this->belongsToMany(Stamp::class, "blank_stamp")
            ->wherePivot("blank_id", $blank_id)
            /* ->leftJoin("project_blank_order_stamp", function ($join) use (
                $project_id,
                $blank_id,
                $order
            ) {
                $join
                    ->on("stamps.id", "=", "project_blank_order_stamp.stamp_id")
                    ->where(
                        "project_blank_order_stamp.project_id",
                        "=",
                        $project_id
                    )
                    ->where(
                        "project_blank_order_stamp.blank_id",
                        "=",
                        $blank_id
                    )
                    ->where("project_blank_order_stamp.order", "=", $order);
            })
            ->selectRaw(
                "IFNULL(pbos_project_blank_order_stamp_unique.new_stamp_id, stamps.content) as content"
            )
            ->pluck("content") */
            //->toArray()
            ->get();
    }

    public function newstampToproject(
        $project_id,
        $blank_id,
        $order,
        $oldstamp_id,
        $newstamp_id
    ) {
        // create row in project_blank_order_stamp
        $project_blank_order_stamp = new ProjectBlankOrderStamp();
        $project_blank_order_stamp->project_id = $project_id;
        $project_blank_order_stamp->blank_id = $blank_id;
        $project_blank_order_stamp->order = $order;
        $project_blank_order_stamp->stamp_id = $oldstamp_id;
        $project_blank_order_stamp->new_stamp_id = $newstamp_id;
        $project_blank_order_stamp->save();
    }
}

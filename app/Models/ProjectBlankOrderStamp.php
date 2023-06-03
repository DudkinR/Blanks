<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectBlankOrderStamp extends Model
{
    use HasFactory;
    protected $table = "project_blank_order_stamp";
    protected $fillable = [
        "project_id",
        "blank_id",
        "order",
        "stamp_id",
        "new_stamp_id",
    ];
    // update_at and created_at false
    public $timestamps = false;
    public function stamps($project_id, $blank_id, $order)
    {
        $stamps = [];
        $stampsN = [];
        $sts = $this->where("project_id", $project_id)
            ->where("blank_id", $blank_id)
            ->where("order", $order)
            ->get();
        foreach ($sts as $st) {
            $stamps[] = \App\Models\Stamp::find($st->stamp_id)->content;
            $stampsN[] = \App\Models\Stamp::find($st->new_stamp_id)->content;
        }
        $stampIdeal = \App\Models\Blank::find($blank_id)
            ->stamps()
            ->pluck("content")
            ->toArray();
        foreach ($stampIdeal as $st) {
            if (!in_array($st, $stamps)) {
                $stamps[] = $st;
                $stampsN[] = $st;
            }
        }
        return ["stamps" => $stamps, "stampsN" => $stampsN];
    }
}

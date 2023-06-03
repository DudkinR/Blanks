<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatBlank extends Model
{
    use HasFactory;
    protected $table = "statblanks";
    protected $fillable = [
        "blank_id",
        "autor_id",
        "finish",
        "dificult",
        "useful",
        "full",
        "understand",
        "detail",
        "popular",
        "potential_ideas",
        "timer",
    ];
    // count unic author_id for blank_id
    public static function countUnicAuthor($blank_id)
    {
        $stat = \App\Models\StatBlank::where("blank_id", $blank_id)->get();
        $unic_autor = [];
        foreach ($stat as $st) {
            if (!in_array($st->autor_id, $unic_autor)) {
                $unic_autor[] = $st->autor_id;
            }
        }
        return count($unic_autor);
    }
}

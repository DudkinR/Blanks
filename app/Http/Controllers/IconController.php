<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IconController extends Controller
{
    public static function show(Request $request)
    {
        $words = explode(" ", $request->words);
        $collection1 = \App\Models\Icon::where(
            "name",
            "like",
            "%" . $words[0] . "%"
        )->get();
        foreach ($words as $word) {
            $collection1 = $collection1->union(
                \App\Models\Icon::where(
                    "name",
                    "like",
                    "%" . $word . "%"
                )->get()
            );
        }
        if ($collection1->count() < 24) {
            // Only get the number of items needed to fill the remaining slots
            $neededItems = 24 - $collection1->count();
            $collection2 = \App\Models\Icon::all()
                ->random(24)
                ->take($neededItems);
            if ($collection1->count() > 0) {
                $collection = $collection1->merge($collection2);
            } else {
                $collection = $collection2;
            }
        } else {
            $collection = $collection1->random(24);
        }

        return $collection->toJson();

        //->toJson()
    }
}

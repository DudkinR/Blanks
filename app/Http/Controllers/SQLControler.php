<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SQLControler extends Controller
{
    // constructor
    public function __construct()
    {
        DB::connection("mysql")->enableQueryLog();
        $queries = DB::connection("mysql")->getQueryLog();
        $caller = debug_backtrace()[1]["file"];
        $data = [];
        $lastQueries = array_slice($queries, -10);
        foreach ($lastQueries as $query) {
            $sql = $query["query"];
            $bilding = json_encode($query["bindings"]);
            $time = $query["time"];
            $insertdata[] = [
                "sql" => $sql,
                "file" => $caller,
                "bindings" => $bilding,
                "time" => $time,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }
        $qsql = new App\Models\QSQL();
        $qsql->insert($insertdata);
    }
}

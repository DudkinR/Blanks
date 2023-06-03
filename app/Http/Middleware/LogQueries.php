<?php
namespace App\Http\Middleware;
use Closure;
use DB;
use Illuminate\Support\Facades\Cache;
use App\Models\QSQL;

class LogQueries
{
    public function handle($request, Closure $next)
    {
        // Включить журналирование запросов
      //  DB::enableQueryLog();
        return $next($request);
    }

    public function terminate($request, $response)
    {
        // Получить все запросы, выполненные в соединении "mysql"
        $queries = DB::getQueryLog();

        // Сохранить запросы в кэш Laravel
        Cache::put("queries", $queries, 10);

        // Записать запросы в базу данных
        $insertData = [];
        foreach ($queries as $query) {
            $sql = $query["query"];
            $bindings = json_encode($query["bindings"]);
            $time = $query["time"];

            $insertData[] = [
                "file" => debug_backtrace()[1]["file"], // "file" => $caller,
                "sql" => $sql,
                "bindings" => $bindings,
                "time" => $time,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }

      //  QSQL::insert($insertData);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Auth
use Illuminate\Support\Facades\Auth;
//DB
use Illuminate\Support\Facades\DB;
//Session
use Illuminate\Support\Facades\Session;

class StatistController extends Controller
{
    public static function calculatePageRating($visitors, $passValue)
    {
        if($passValue==1)$passValue+=1;
        $rating = log($visitors) / log($passValue); // логарифмический рейтинг платных посещений
        $delta = $visitors * $passValue * 0.01 * 0.01; // дельта рейтинга
        $result = $rating * $delta; // рейтинг страницы

        // Преобразуем рейтинг в диапазон от 0 до 10
        $min_rating = 0; // Минимальное значение рейтинга
        $max_rating = 10; // Максимальное значение рейтинга

        // Преобразуем рейтинг в диапазон от 0 до 10 с помощью линейной интерполяции
        $interpolated_rating =
            (($result - $min_rating) * (10 - 0)) / ($max_rating - $min_rating) +
            0;

        // Ограничиваем значение рейтинга максимальным значением 10
        if ($interpolated_rating > 10) {
            $interpolated_rating = 10;
        }

        return $interpolated_rating;
    }
    public static function stat_project($project_id, $object)
    {
        $project = \App\Models\Project::find($project_id);
        $blanks = $project->blanks;
        //`finish`, `dificult`, `useful`, `full`, `understand`, `detail`, `popular`, `potential_ideas`, `timer`
        $reiting=0;
        $finish = 0;
        $dificult = 0;
        $usefull = 0;
        $full=0;
        $understand = 0;
        $detail = 0;
        $popular = 0;
        $potential_ideas = 0;
        $timer = 0;
        $min_timer = 0;
        $max_timer = 0;
        $count_blanks = 0;
        $price = 0;   
        foreach ($blanks as $blank) {
            $stat_blank = $object->rating_blank($blank->id);
            $reiting+= $stat_blank["reiting"]* $stat_blank["full"]*$stat_blank["popular"]*$stat_blank["detail"]*$stat_blank["dificult"]*$stat_blank["usefull"]*$stat_blank["understand"]*0.00000000001;
            $finish += $stat_blank["finish"];
            $full += $stat_blank["full"];
            $dificult += $stat_blank["dificult"];
            $usefull += $stat_blank["usefull"];
            $understand += $stat_blank["understand"];
            $detail += $stat_blank["detail"];
            $popular += $stat_blank["popular"];
            $potential_ideas += $stat_blank["potential_ideas"];
            $timer += $stat_blank["timer"];
            $min_timer += $stat_blank["min_timer"];
            $max_timer += $stat_blank["max_timer"];
            $count_blanks +=1;
            $price += $stat_blank["price"];
        }
        if ($count_blanks > 0) {
            return [
                "reiting" =>  $reiting / $count_blanks,
                "finish" => $finish / $count_blanks,
                "full" => $full / $count_blanks,
                "dificult" => $dificult / $count_blanks,
                "usefull" => $usefull / $count_blanks,
                "understand" => $understand / $count_blanks,
                "detail" => $detail / $count_blanks,
                "popular" => $popular / $count_blanks,
                "potential_ideas" => $potential_ideas / $count_blanks,
                "timer" => $timer / $count_blanks,
                "min_timer" => $min_timer,
                "max_timer" => $max_timer,
                "count_blanks" => $count_blanks,
                "price" => $price,
            ];
        } else {
            return [
                "finish" => 0,
                "full" => 0,
                "dificult" => 0,
                "usefull" => 0,
                "understand" => 0,
                "detail" => 0,
                "popular" => 0,
                "potential_ideas" => 0,
                "timer" => 0,
                "min_timer" => 0,
                "max_timer" => 0,
                "count_blanks" => 0,
                "price" => 0,
            ];
        }
    }

    public function stat(Request $request, $blank)
    {
        // validate  Auth::id()  if not exist to login

        $validatedData = $request->validate([
            "blank" => "required",
            "wf" => "nullable|boolean",
            "fdificult" => "required|integer",
            "fuseful" => "required|integer",
            "ffull" => "required|integer",
            "funderstand" => "required|integer",
            "fdetail" => "required|integer",
            "fpopular" => "required|integer",
            "ideas" => "nullable|integer",
            "timer" => "nullable|integer",
        ]);

        $user = Auth::user();
        $stat = new \App\Models\StatBlank();
        $stat->blank_id = $request->blank;
        if (isset($request->wf)) {
            $stat->finish = 1;
        } else {
            $stat->finish = 0;
        }
        $stat->author_id = $user->id;
        $stat->dificult = $validatedData["fdificult"];
        $stat->useful = $validatedData["fuseful"];
        $stat->full = $validatedData["ffull"];
        $stat->understand = $validatedData["funderstand"];
        $stat->detail = $validatedData["fdetail"];
        $stat->popular = $validatedData["fpopular"];
        $stat->potential_ideas = $validatedData["ideas"];
        $stat->timer = $validatedData["timer"];
        $stat->save();
        if ($request->project) {
             
            $work_now = session("work_now");
            $project_order = $work_now["project_order"];
            $prj_bl = DB::table("project_blank")
                ->where("project_id", "=", $request->project)
                ->where("blank_id", "=", $request->blank)
                ->where("author_id", "=", Auth::id())
                ->where("order", "=", $project_order)
                ->update(["type" => 1]);
            $project = \App\Models\Project::find($request->project);
            Session::put("project", $project->id);
            foreach(Session::all() as $key=>$val){
                if(count(explode("wblank_",$key))>1)Session::forget($key);
                if(count(explode("wbproject_",$key))>1)Session::forget($key);
            }
            Session::forget("work_blank_project");
            if($project->author_id==Auth::id())
                return view("project.show", compact("project"));
            else
                return view("project.show_guest", compact("project"));

        }
        return redirect()->route("blanks.show", $request->blank);
    }
    // рейтинг бланка
    public function rating_blank($blank_id)
    {
        $blank = \App\Models\Blank::find($blank_id);
        $stat = \App\Models\StatBlank::where("blank_id", $blank_id)
        ->where("finish", 1)
        ->get();
        $reiting = 0;
        $finish = 0;
        $full = 0;
        $dificult = 0;
        $usefull = 0;
        $understand = 0;
        $detail = 0;
        $popular = 0;
        $potential_ideas = 0;
        $timer = 0;
        $min_timer = 0;
        $max_timer = 0;
        $count_blanks = 0;
        $price = 0;
        $min_t[$blank->id] = 0;
        $max_t[$blank->id] = 0;
        $unic_author = [];
        foreach ($stat as $st) {
            if (!in_array($st->author_id, $unic_author)) {
                $unic_author[] = $st->author_id;
            }

            $finish += $st->finish;
            $full += $st->full;
            $dificult += $st->dificult;
            $usefull += $st->full;
            $understand += $st->understand;
            $detail += $st->detail;
            $popular += $st->popular;
            $potential_ideas += $st->potential_ideas;
            $timer += $st->timer;
            if ($min_t[$blank->id] == 0) {
                $min_t[$blank->id] = $st->timer;
                $max_t[$blank->id] = $st->timer;
            }
            if ($min_t[$blank->id] > $st->timer) {
                $min_t[$blank->id] = $st->timer;
            }
            if ($max_t[$blank->id] < $st->timer) {
                $max_t[$blank->id] = $st->timer;
            }
            $count_blanks++;

        }
        if (count($unic_author) > $blank->start) {
            $price += 1;
        }

        $min_timer += $min_t[$blank->id];
        $max_timer += $max_t[$blank->id];
        if ($count_blanks > 0) {
            return [
                "reiting" => $this->calculatePageRating(
                    count($unic_author),
                    $blank->start
                ),
                "unic_author" => count($unic_author),
                "finish" => $finish / $count_blanks,
                "full" => $full / $count_blanks,
                "dificult" => $dificult / $count_blanks,
                "usefull" => $usefull / $count_blanks,
                "understand" => $understand / $count_blanks,
                "detail" => $detail / $count_blanks,
                "popular" => $popular / $count_blanks,
                "potential_ideas" => $potential_ideas / $count_blanks,
                "timer" => $timer / $count_blanks,
                "min_timer" => $min_timer,
                "max_timer" => $max_timer,
                "count_blanks" => $count_blanks,
                "price" => $price,
            ];
        } else {
            return [
                "reiting" => 0,
                "finish" => 0,
                "full" => 0,
                "dificult" => 0,
                "usefull" => 0,
                "understand" => 0,
                "detail" => 0,
                "popular" => 0,
                "potential_ideas" => 0,
                "timer" => 0,
                "min_timer" => 0,
                "max_timer" => 0,
                "count_blanks" => 0,
                "price" => 0,
            ];
        }
    }
}

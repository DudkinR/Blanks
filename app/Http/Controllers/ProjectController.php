<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // Auth::id();

        if (isset($request->searchwords)) {
            $wrds = explode(" ", trim(e($request->searchwords)));
            Session::put('searchW',trim(e($request->searchwords)));
        } else {
            if(session('searchW')!==null)
                $wrds = explode(" ", session('searchW'));
            else{
                $wrds = [];
                Session::put('searchW','');
            }
        }
       // return $wrds;
        $categories = \App\Models\Category::where("author_id", "=", Auth::id())
            ->orderBy("name", "ASC")
            ->get();
        $projects = \App\Models\Project::where("author_id", "=", Auth::id())
            ->orwhere(function ($q) {
                return $q
                    ->where("author_id", "!=", Auth::id())
                    ->where("status", "=", 2);
            })
            ->where(function ($q) use ($wrds) {
                $i = 0;
                foreach ($wrds as $w) {
                    if ($i == 0) {
                        $q->where("name", "like", "%" . $w . "%");
                    } else {
                        $q->orwhere("name", "like", "%" . $w . "%");
                    }
                    $i++;
                }
                return $q;
            })
            ->orderBy("name", "DESC")

            ->get();

        //  }

        return view("project.index", compact("projects", "categories"));
    }
    public function create(Request $request)
    {
        if (isset($request->parent_id)) {
            $parent_id = $request->parent_id;
        } else {
            $parent_id = 0;
        }
        //$icons=IconController::show($request);
        // return $icons;
        return view("project.create", compact("parent_id"));
    }
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request, [
            "status" => "integer",
            "name" => "string",
        ]);
        $project = new \App\Models\Project();
        // author id from session
        //`author_id`,'name', `lang`, `status`, `created_at`, `updated_at`
        $project->author_id = Auth::id();

        $project->lang = session()->get("locale");
        $project->name = $request->name;
        $project->status = $request->status;
        Session::put("status", $request->status);
        $project->save();
        Session::put("project", $project->id);
        if (isset($request->blank)) {
            $project->blanks()->attach($request->blank);
            $max_order = DB::table("project_blank")
                ->where("project_id", "=", $project->id)
                ->max("order");
            DB::table("project_blank")
                ->where("project_id", "=", $project->id)
                ->where("blank_id", "=", $request->blank)
                ->where("order", "=", null)
                ->update(["order" => $max_order + 1]);
            return redirect()->route("blanks.show", $request->blank);
        }
        //return redirect()->route('project.index');
        return redirect("/project");
    }
    public function show($id)
    {
        $project = \App\Models\Project::find($id);
        if ($project->author_id !== Auth::id()) {
            return back();
        }
        Session::put("project", $project->id);
        // $this->normalOrder($id,Auth::id());
        return view("project.show", compact("project"));
    }
    public function show_guest($id)
    {
        $project = \App\Models\Project::find($id);
        // $this->normalOrder($id,Auth::id());
        return view("project.show_guest", compact("project"));
    }
    public function replay($id)
    {
        $project = \App\Models\Project::find($id);
        if ($project->author_id !== Auth::id()) {
            return back();
        }
        foreach ($project->blanks as $blank) {
            $bls = $project->blanks
                ->where("pivot.blank_id", "=", $blank->id)
                ->where("pivot.type", "=", 1);
            foreach ($bls as $bl) {
                $bl->pivot->update(["type" => 0]);
            }
        }
        Session::forget("work_now");

        /// del all in project_work
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        Session::put("project", $project->id);
        // $this->normalOrder($id,$project->author_id);
        return view("project.show", compact("project"));
    }
    
    public function replay_guest($id)
    {
        $project = \App\Models\Project::find($id);
        DB::table("project_blank")
        ->where('project_id',$project->id)
        ->where('author_id',Auth::id())
        ->update(['type'=>0]);
        Session::forget("work_now");
        Session::put("project", $project->id);
        return redirect()->route("project.show_guest", $id);
    }
    public static function progress($id)
    {
        if ($id == 0) {
            return 0;
        }
        $project = \App\Models\Project::find($id);
        $total_items = 0;
        $do_items = 0;
        $new_items = 0;

        // return $project->blanks[2]->items;
        foreach ($project->blanks as $blank) {
            if ($blank->pivot->type == 1) {
                $do_items += $blank->items()->count();
            } else {
                if (session("work_now") !== null) {
                    $data = session("work_now");
                    if (
                        $data["project"] == $id &&
                        $data["blank"]->id == $blank->id
                    ) {
                        $do_items += $data["order"];
                    }
                }
            }
            $total_items += $blank->items()->count();
        }

        // return $do_items;
        // return $total_items;
        $pr = $total_items / 100;
        return $do_items / $pr;
    }

    public function head($id)
    {
        $project = \App\Models\Project::find($id);
        if ($project->author_id !== Auth::id()) {
            return back();
        }
        Session::put("project", $project->id);
        // $this->normalOrder($id,Auth::id());
        return view("project.show", compact("project"));
    }
    public function edit($id)
    {
        $project = \App\Models\Project::find($id);
        if ($project->author_id !== Auth::id()) {
            return back();
        }
        Session::put("project", $project->id);
        return view("project.edit", compact("project"));
    }
    public function update(Request $request, $id)
    {
        $project = \App\Models\Project::find($id);
        if ($project->author_id !== Auth::id()) {
            return back();
        }
        $project->name = $request->name;
        $project->status = $request->status;
        Session::put("status", $request->status);
  
        $project->save();
        if($project->status == 2){
            $blankController=new \App\Http\Controllers\BlankController();
            foreach($project->blanks as $blank){
                $blank->status=2;
                $blank->save();
                $blankController->go_to_free($blank);
            }
        }
        Session::put("project", $project->id);
        return back();
      //  return redirect()->route("project.index");
    }
    public function destroy($id)
    {
        $project = \App\Models\Project::find($id);
        if ($project->author_id !== Auth::id()) {
            return back();
        }
        if ($project->id == session("project")) {
            Session::forget("project");
        }
         foreach($project->blanks as $blank){
            //`project_id`, `blank_id`
            DB::table('project_blank')
            ->where('project_id',$id)
            ->where('blank_id',$blank->id)
            ->where('author_id',Auth::id())
            ->delete();
            DB::table('project_blank_order_stamp')
            ->where('project_id',$id)
            ->where('blank_id',$blank->id)
            ->delete();
        }
        DB::table('projects')
        ->where('id',$id)
        ->delete();
       // $project->delete();
        // $this->normalOrder($id,Auth::id());
        return redirect()->route("project.index", [
            "message" => "Project deleted",
        ]);
    }
    public function api_work_add(Request $request)
    {
        //return session('project');
        if (isset($request->blank)) {
            if (session("project") !== null) {
                $project = \App\Models\Project::find(session("project"));
            } else {
                if (
                    !($project = \App\Models\Project::where(
                        "author_id",
                        "=",
                        Auth::id()
                    )
                        ->get()
                        ->last())
                ) {
                    $project = new \App\Models\Project();
                    // author id from session
                    //`author_id`,'name', `lang`, `status`, `created_at`, `updated_at`
                    $project->author_id = 1;
                    $project->lang = "en";
                    $project->name = "New project " . now();
                    $project->status = 0;
                    $project->save();
                    Session::put("project", $project->id);
                }
            }
            //  $insertdata = [["condition_id" => $finish->id, "order" => $next]];
            //   $bl->finishconditions()->attach($insertdata);
            $max_order = DB::table("project_blank")
                ->where("project_id", "=", $project->id)
                ->where('author_id',Auth::id())
                ->max("order");
             $insertdata = [
                ["order" => $max_order + 1,"type"=>0,"author_id"=>Auth::id(), "blank_id" => $request->blank,  "project_id" =>$project->id ],
            ];
           $project->blanks()->attach($insertdata);
            if($project->status == 2){
                $blankController=new \App\Http\Controllers\BlankController();
                foreach($project->blanks as $blank){
                    $blank->status=2;
                    $blank->save();
                    $blankController->go_to_free($blank);
                }
            }
            return $project->blanks;
        }
        return "where blank";
    }
    //  order  shift up
    public function shift_up(Request $request)
    {
        $blank_id = $request->blank;
        $project_id = $request->project;

        $order = $request->order;
        $priv_order = $order - 1;
        $project = \App\Models\Project::find($project_id);
        if ($project->author_id !== Auth::id()) {
            return back();
        }

        if ($priv_order > 0) {
            $current = \App\Models\Project::find($project_id)
                ->blanks->where("pivot.order", "=", $order)
                ->where("pivot.project_id", "=", $project_id)
                ->where("pivot.blank_id", "=", $blank_id)
                ->where("pivot.author_id", "=", Auth::id())
                   ->first();
            $priv = \App\Models\Project::find($project_id)
                ->blanks->where("pivot.order", "<", $order)
                ->where("pivot.project_id", "=", $project_id)
                ->where("pivot.author_id", "=", Auth::id())
                ->last();

            DB::table("project_blank")
                ->where("id", "=", $current->pivot->id)
                ->update(["order" => $priv_order]);
            // update project_blank_order_stamp
            DB::table("project_blank_order_stamp")
                ->where("project_id", "=", $project_id)
                ->where("blank_id", "=", $current->pivot->blank_id)
                ->where("author_id", "=", Auth::id())
                ->where("order", "=", $order)
                ->update(["order" => $priv_order]);

            DB::table("project_blank")
                ->where("id", "=", $priv->pivot->id)
                ->update(["order" => $order]);
            // update project_blank_order_stamp
            DB::table("project_blank_order_stamp")
                ->where("project_id", "=", $project_id)
                ->where("blank_id", "=", $priv->pivot->blank_id)
                ->where("order", "=", $priv_order)
                ->where("author_id", "=", Auth::id())
                ->update(["order" => $order]);
        }
        // return \App\Models\Project::find($project_id)->blanks;
        // $this->normalOrder($project_id,Auth::id());
        return redirect()->route("project.show", [
            "project" => \App\Models\Project::find($project_id),
        ]);
    }
    //  order  shift down
    public function shift_down(Request $request)
    {
        $blank_id = $request->blank;
        $project_id = $request->project;
        $order = $request->order;
        $next_order = $order + 1;
        $project = \App\Models\Project::find($project_id);
        if ($project->author_id !== Auth::id()) {
            return back();
        }
        $max_order = $current = \App\Models\Project::find($project_id)
            ->blanks->where("pivot.project_id", "=", $project_id)
            ->max("pivot.order");
        if ($next_order <= $max_order) {
            $current = \App\Models\Project::find($project_id)
                ->blanks->where("pivot.order", "=", $order)
                ->where("pivot.project_id", "=", $project_id)
                ->where("pivot.blank_id", "=", $blank_id)
                ->where("pivot.author_id", "=", Auth::id())
                ->first();
            $next = \App\Models\Project::find($project_id)
                ->blanks->where("pivot.order", ">", $order)
                ->where("pivot.project_id", "=", $project_id)
                ->where("pivot.author_id", "=", Auth::id())
                ->first();

            DB::table("project_blank")
                ->where("id", "=", $current->pivot->id)
                ->update(["order" => $next_order]);
            // update project_blank_order_stamp
            DB::table("project_blank_order_stamp")
                ->where("project_id", "=", $project_id)
                ->where("blank_id", "=", $current->pivot->blank_id)
                ->where("order", "=", $order)
                ->where("author_id", "=", Auth::id())
                ->update(["order" => $next_order]);

            DB::table("project_blank")
                ->where("id", "=", $next->pivot->id)
                ->update(["order" => $order]);
            // update project_blank_order_stamp
            DB::table("project_blank_order_stamp")
                ->where("project_id", "=", $project_id)
                ->where("blank_id", "=", $next->pivot->blank_id)
                ->where("order", "=", $next_order)
                ->where("author_id", "=", Auth::id())
                ->update(["order" => $order]);
        }
        // $this->normalOrder($project_id,Auth::id());
        return redirect()->route("project.show", [
            "project" => \App\Models\Project::find($project_id),
        ]);
    }
    // order insert project after order = $num
    public function insert_after(Request $request)
    {
        $blank_id = $request->blank;
        $project_id = $request->project;
        $project = \App\Models\Project::find($project_id);
        if ($project->author_id !== Auth::id()) {
            return back();
        }
        $num = $request->num;
        DB::table("project_blank")
            ->where("blank_id", "=", $blank_id)
            ->where("author_id", "=", Auth::id())
            ->where("order", ">=", $num)
            ->increment("order");
        DB::table("project_blank")
            ->where("blank_id", "=", $blank_id)
            ->where("project_id", "=", $project_id)
            ->where("author_id", "=", Auth::id())
            ->update(["order" => $num]);
        return redirect()->route("blanks.show", ["blank" => $request->blank]);
    }

    public function startproject($project, Request $request)
    {
        $work_project = \App\Models\Project::find($project);

        if ($work_project->author_id !== Auth::id()) {
            return back();
        }
        if ($blanks = $this->type_blanks_project($project, 0)) {
            // не выполненные бланки
            // берем первый по списку бланк проверяем его что он есть в бд как текущая работа
            $start = DB::table("work_project")
                ->where("project_id", "=", $project)
                ->where("user_id", "=", Auth::id())
                ->where("blank_id", "=", $blanks[0]->id)
                ->where("type", "=", 0)
                ->get();
            $blank = $blanks[0];
            $project_order = $start[0]->order;

            if ($start->count() == 0) {
                // бп нет в текущих выполняемых делаем запись в бд
                $itms = $blank->items;
                // return $itms[0]->pivot->id;
                $startitem = $itms[0]->pivot->id; //вычисляем первый пункт и бросаем на выполнение pivot
                $startitem_id = $itms[0]->pivot->item_id; //вычисляем первый пункт и бросаем на выполнение pivot

                $order =
                    DB::table("work_project")
                        ->where("project_id", "=", $project)
                        ->where("user_id", "=", Auth::id())
                        ->max("order") + 1;
                DB::table("work_project")->insert([
                    "project_id" => $project,
                    "order" => $order,
                    "blank_id" => $blank->id,
                    "user_id" => Auth::id(),
                    "type" => 0,
                    "item_id" => $startitem, //вычисляем первый пункт и бросаем на выполнение
                    "created_at" => now(),
                    "updated_at" => now(),
                ]);

                $order = 0;
                $item_priv_id = 0;
                $item_priv = [];
                if ($blank->items->count() > 0) {
                    $item = \App\Models\Item::find(
                        $blank->items->first()->pivot->item_id
                    );
                    $order = $blank->items
                        ->where("pivot.order", ">", $order)
                        ->first()->pivot->order;
                } else {
                    return false;
                }
                if (
                    $blank->items->where("pivot.order", ">", $order)->count() >
                    0
                ) {
                    $item_next = \App\Models\Item::find(
                        $blank->items
                            ->where("pivot.order", ">", $order)
                            ->first()->pivot->item_id
                    );
                    $item_next_id = $item_next->id;
                } else {
                    $item_next = [];
                    $item_next_id = 0;
                }
            } else {
                //есть  бп как текущая работа берем текущуй пункт и бросаем его на выполнение
                $startitem = $start[0]->item_id; // это номер в пивот таблице
                $blank = \App\Models\Blank::find($start[0]->blank_id);
                $triger = 0;
                $item_next = [];
                foreach ($blank->items as $itm) {
                    if ($triger == 0) {
                        $item_priv = $itm;
                    }
                    if ($triger == 1) {
                        $item_next = $itm;
                        break;
                    }
                    if ($itm->pivot->id == $startitem) {
                        $item = $itm;
                        $order = $itm->pivot->order;
                        $triger = 1;
                    }
                }
                if ($item_priv == $item) {
                    $item_priv = [];
                    $item_priv_id = 0;
                } else {
                    $item_priv_id = $item_priv->id;
                }
                if ($item_next == $item) {
                    $item_next = [];
                    $item_next_id = 0;
                } elseif ($item_next !== []) {
                    $item_next_id = $item_next->id;
                }
            }

            //show all vars
            $work_now = [
                "project" => $project,
                "item_next" => $item_next,
                "item_priv" => $item_priv,
                "item_next_id" => $item_next_id,
                "item_priv_id" => $item_priv_id,
                "item" => $item,
                "order" => $order,
                "blank" => $blank,
                "project_order" => $project_order,
            ];
            session()->put("work_now", $work_now);

            if (isset($request->timerStart)) {
                $gotime = time() - $request->timerStart;
            } else {
                $gotime = 0;
            }
            // если итем последний то бросаем на финиш
            $timerStart = time();
            \App\Http\Controllers\BlankController::itemstat($item, $gotime); // add to session item time
            $items_count = $blank->items->count();

            // $order=
            /*  if ($blank->items->last()->pivot->id == $startitem) {
            // go to finish  последний пункт
            $items = $blank->items;
            Session::put("item_" . $item->id, $gotime);
            return redirect()->route("blanks.finish", $item->id);
        } else { */
            $items = $blank->items;
            // если итем текущий или первый то бросаем на ворк
            $progress = [
                "items_count" => $items_count,
                "order" => $order,
                "pr" => ceil($order / ($items_count / 100)),
            ];

            $start_positions = $blank->startconditions;
            $mass_start_positions = [];
            foreach ($start_positions as $start_position) {
                $mass_start_positions[] = $start_position;
            }
            session(["start_positions" . $blank->id => $mass_start_positions]);

            $finish_positions = $blank->finishconditions;
            $mass_finish_positions = [];
            foreach ($finish_positions as $finish_position) {
                $mass_finish_positions[] = $finish_position;
            }
            session([
                "finish_positions" . $blank->id => $mass_finish_positions,
            ]);
            // Получаем первый элемент из сессии
            $start_positions = Session::pull("start_positions" . $blank->id);
            if (isset($start_positions[0])) {
                $start_position = $start_positions[0];
            } else {
                $start_position = "empty";
            }
            // Удаляем первый элемент из сессии и записываем обратно
            if (count($start_positions) > 1) {
                $start_positions = array_slice($start_positions, 1);
            } else {
                $start_positions = [];
            }
            Session::put("start_positions" . $blank->id, $start_positions);

            // Передаем стартовую позицию во view
            return view("blanks.start", [
                "start_position" => $start_position,
                "progress" => 0,
                "progressPR" => 0,
                "order" => 0,
                "blank" => $blank->id,
            ]);
        } else {
            return view("project.show", ["project" => $work_project]);
        }
    }
    public function type_blanks_project($project, $type = 0)
    {
        $work_project = \App\Models\Project::where("id", "=", $project) ->where("pivot.author_id", "=", Auth::id())->get();
        $wbls = [];
        foreach ($work_project[0]->blanks as $blank) {
            if ($blank->pivot->type == $type) {
                $wbls[] = $blank;
            }
        }
        if ($wbls !== []) {
            return $wbls;
        } else {
            return false;
        }
    }
    public function projectblankdestroy($project, Request $request)
    {
        $blank = $request->blank;
        if ($project !== $request->project) {
            return null;
        }
        $order = $request->order;
        if (\App\Models\Project::find($project)->author_id !== Auth::id()) {
            return back();
        }
        DB::table("project_blank")
            ->where("project_id", $project)
            ->where("blank_id", $blank)
            ->where("order", $order)
            //->get();
            ->delete();
        // $bl;
        return back();
    }
    public function copy(Request $request)
    {
        $this->validate($request, [
            "project" => "integer",
            "blank" => "integer",
            "order" => "integer",
        ]);

        $blank_id = $request->blank;
        $project_id = $request->project;
        $order_id = $request->order;
        $project = \App\Models\Project::find($project_id);
        if ($project->author_id !== Auth::id()) {
            return back();
        }
        // ->where("pivot.author_id", "=", Auth::id())
        $insertdata = [["blank_id" => $blank_id,"author_id" => Auth::id(), "order" => $order_id + 1]];
        $project->blanks()->attach($insertdata);
      //  $this->normalOrder($project_id,Auth::id());
        return back();
    }
    public function normalOrder($project_id,$author_id)
    {
        $project = \App\Models\Project::find($project_id);
        $blanks = $project->blanks;
        $order = 1;
        $insertdata = [];
        foreach ($blanks as $blank) {
            $insertdata[] = ["blank_id" => $blank->id, "author_id" => $author_id, "type" => 0, "order" => $order];
            $order++;
        }
        $project->blanks()->detach();
        $project->blanks()->attach($insertdata);
    }
    public function copy_project($id)
    {
        // Найти оригинальную модель, которую необходимо скопировать
        $original = Blank::with("связь1", "связь2")->find(2);

        // Создать новый экземпляр модели
        $newModel = new Blank();

        // Скопировать все свойства модели, используя метод getAttributes()
        $newModel->fill($original->getAttributes());

        // Скопировать связи модели, используя метод setRelation()
        foreach ($original->getRelations() as $relationName => $relationValue) {
            $newModel->setRelation($relationName, $relationValue);
        }

        // Сохранить новую модель
        $newModel->save();
    }

    public static function current_project()
    {
        if (session("project") !== null) {
            $project_current = \App\Models\Project::find(session("project"));
        } else {
            if (
                !($project_current = \App\Models\Project::where(
                    "author_id",
                    "=",
                    Auth::id()
                )
                    ->get()
                    ->last())
            ) {
                $project_current = new \App\Models\Project();
                // author id from session
                //`author_id`,'name', `lang`, `status`, `created_at`, `updated_at`
                $project_current->author_id = 1;
                $project_current->lang = "en";
                $project_current->name = "New project " . now();
                $project_current->status = 0;
                $project_current->save();
                Session::put("project", $project_current->id);
            }
        }
        return $project_current;
    }
    public function buy_project($project_id)
    {
        // проверим сколько денег на счету и сколько стоит проект
        $project = \App\Models\Project::find($project_id); // загружаем проект который надо скопировать
        $mass_blanks = [];
        $project_price_buy = 0;
        $mass_blanks_for_buy = [];
        $i = 1;
        $blankController = new \App\Http\Controllers\BlankController();
        foreach ($project->blanks as $blank) {
            // сколько денег надо срубить
            if (!in_array($blank->id, $mass_blanks_for_buy)) {
                if (
                    $blank->author_id !== Auth::id() &&
                    \App\Models\Blank::where("Author_id", Auth::id())
                        ->where("parent_id", $blank->id)
                        ->count() > 0
                ) {
                    // если не являются вашими или уже куплеными
                    $project_price_buy += 1;
                    $mass_blanks_for_buy[$blank->id] = $blank->id;
                } else {
                    $mass_blanks_for_buy[$blank->id] = 0;
                }
            }
            $mass_blanks[$i] = $blank->id;
            $i++;
        }
      //  return $project_price_buy;
        if (Auth::user()->suns >= $project_price_buy) {
            $new_project = new \App\Models\Project();
            $new_project->name = $project->name;
            $new_project->status = 1;
            $new_project->author_id = Auth::id();
            $new_project->save();
            $new_mass_blanks_for_buy = [];

            foreach ($mass_blanks_for_buy as $key => $val) {
                if ($val == 0) {
                   
                    $new_mass_blanks_for_buy[
                        $key
                    ] = $key;
                } else {
                    $new_mass_blanks_for_buy[$key] = $blankController->buy_blank_for_project($val)->id;
                }
            }
            $pr_bl_or_st = [];
          //   $new_mass_blanks_for_buy;
            foreach ($mass_blanks as $order => $blank) {
                // перебираем по порядку все бланки проекта
                $insertdata[] = 
                ["blank_id" => $new_mass_blanks_for_buy[$blank],
                    "type"=>0,
                    "order" => $order,
                    "author_id" =>Auth::id()
                ];
                // я знаю проект бланк и ордер
                $pr_bl_or_st[$project->id][$blank][$order] = [
                    $new_project->id,
                    $new_mass_blanks_for_buy[$blank],
                    $order,
                    
                ];
            }
           // return  $insertdata;
            $new_project->blanks()->attach( $insertdata);
            //перебрать все $pr_bl_or_st[$project->id][$blank]
            foreach ($pr_bl_or_st as $project_id => $blanks) {
                foreach ($blanks as $blank_id => $orders) {
                    foreach ($orders as $order => $data) {
                        $old_stamps = \App\Models\ProjectBlankOrderStamp::where(
                            "project_id",
                            $project_id
                        )
                            ->where("blank_id", $blank_id)
                            ->where("order", $order)
                            ->get();
                        foreach ($old_stamps as $old_stamp) {
                            $stm1 = $old_stamp->stamp_id;
                            $stm2 = $old_stamp->new_stamp_id;
                            $mystamp_id = $this->find_similar_stamp($stm1);
                            $mynew_stamp_id=$this->find_similar_stamp($stm2);
                            $new_stamp = new \App\Models\ProjectBlankOrderStamp();
                            $new_stamp->project_id = $data[0];
                            $new_stamp->blank_id = $data[1];
                            $new_stamp->order = $data[2];
                            $new_stamp->stamp_id = $mystamp_id;
                            $new_stamp->new_stamp_id = $mynew_stamp_id;
                            $new_stamp->save();
                        }
                    }
                }
            }
            return back();
        } else {
            return "no money, no honey";
        }
    }
    public function find_similar_stamp($stamp_id)
    {
        $stamp = \App\Models\Stamp::find($stamp_id);
        $stamps = \App\Models\Stamp::where("content", $stamp->content)
            ->where("author_id", "!=", Auth::id())
            ->first();
        if ($stamps->count() > 0) {
            return $stamps->id;
        } else {
            $new_stamp = new \App\Models\Stamp();
            $new_stamp->content = $stamp->content;
            $new_stamp->author_id = Auth::id();
            $new_stamp->save();
            return $new_stamp->id;
        }
    }
}

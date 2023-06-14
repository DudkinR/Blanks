<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Facades\BlankServiceFacade;
class BlankController extends Controller
{
    //index
    public function index(Request $request)
    {
        
        if (isset($request->searchwords)) {
            $wrds = explode(" ", trim(e($request->searchwords)));
            Session::put("searchW", trim(e($request->searchwords)));
        } 
         elseif(trim($request->searchwords)=='')
        {
            Session::forget("searchW");
            $wrds = [];
        }
        else
        {
            if (session("searchW") !== null) {
                $wrds = explode(" ", session("searchW"));
            } else {
                $wrds = [];
            }
        }
       // return $wrds;
        $categories = \App\Models\Category::where("author_id", "=", Auth::id())
            ->orderBy("name", "DESC")
            ->get();
        if (isset($request->blank)) {
            $level = $request->blank;
        } else {
            $level = 0;
        }
        if (isset($request->cat)) {
            $category_id = $request->cat; // the ID of the category you want to find items for
            if ($category_id == 0) {
                $blanks = \App\Models\Blank::whereDoesntHave(
                    "blanks.categories"
                )
                    ->where(function ($q) {
                        return $q
                            ->where("author_id", "=", Auth::id())
                            ->orwhere("status", "=", 2);
                    })
                    ->where(function ($q) use ($wrds) {
                        $i = 0;
                        foreach ($wrds as $w) {
                            if ($i == 0) {
                                $q->where(
                                    "name",
                                    "like",
                                    "%" . $w . "%"
                                )->orwhere("tcheme", "like", "%" . $w . "%");
                            } else {
                                $q->orwhere(
                                    "name",
                                    "like",
                                    "%" . $w . "%"
                                )->orwhere("tcheme", "like", "%" . $w . "%");
                            }
                            $i++;
                        }
                        return $q;
                    })
                    ->orderBy("id", "DESC")
                    ->get();
            } else {
                $blanks = \App\Models\Blank::whereHas("categories", function (
                    $query
                ) use ($category_id) {
                    $query->where("categories.id", $category_id);
                })
                    ->where(function ($q) {
                        return $q
                            ->where("author_id", "=", Auth::id())
                            ->orwhere("status", "=", 2);
                    })
                    ->where(function ($q) use ($wrds) {
                        $i = 0;
                        foreach ($wrds as $w) {
                            if ($i == 0) {
                                $q->where(
                                    "name",
                                    "like",
                                    "%" . $w . "%"
                                )->orwhere("tcheme", "like", "%" . $w . "%");
                            } else {
                                $q->orwhere(
                                    "name",
                                    "like",
                                    "%" . $w . "%"
                                )->orwhere("tcheme", "like", "%" . $w . "%");
                            }
                            $i++;
                        }
                        return $q;
                    })
                    ->orderBy("id", "DESC")
                    ->get();
            }
        } else {
            $blanks = \App\Models\Blank::where("parent_id", "=", $level)
                ->where("author_id", "=", Auth::id())
                ->where(function ($query) use ($level) {
                    return $query;
                    //  ->where("status", "=", 2)
                    //  ->where("parent_id", "=", $level);
                })
                ->where(function ($q) use ($wrds) {
                    $i = 0;
                    foreach ($wrds as $w) {
                        if ($i == 0) {
                            $q->where("name", "like", "%" . $w . "%")->orwhere(
                                "tcheme",
                                "like",
                                "%" . $w . "%"
                            );
                        } else {
                            $q->orwhere(
                                "name",
                                "like",
                                "%" . $w . "%"
                            )->orwhere("tcheme", "like", "%" . $w . "%");
                        }
                        $i++;
                    }
                    return $q;
                })
                ->orderBy("name", "DESC")
                // ->orwhere('status','=',2)
                ->get();
            // return $blanks;
        }
        $project_current = \App\Http\Controllers\ProjectController::current_project();
        // return $blanks;
        return view(
            "blanks.index",
            compact("blanks", "categories", "project_current")
        );
    }

    public function readyitemsform(Request $request)
    {
        $itemsid = [];
        foreach ($request->request as $key => $val) {
            if (count(explode("_blank_item_", $key)) > 1) {
                $itemsid[] = $val;
            }
            if(count(explode("asi_", $key)) > 1) {
                $itemsid[] = $val;
            }
        }
        $items = \App\Models\Item::whereIn("id", $itemsid)->get();
        $position = [];
        if (isset($request->category)) {
            $category_id = $request->category;
            $ctg = \App\Models\Category::find($category_id);
            foreach ($ctg->positions as $psn) {
                $position[] = $psn->id;
            }
        } else {
            // go select category
            // return redirect()->route('categories.index');
            $category_id = 0;
        }

        $positions = \App\Models\Position::where(
            "author_id",
            "=",
            Auth::id()
        )->get();
        $categories = \App\Models\Category::where(
            "author_id",
            "=",
            Auth::id()
        )->get();
        return view(
            "blanks.create",
            compact(
                "categories",
                "positions",
                "position",
                "category_id",
                "items"
            )
        );
    }

    //create
    public function create(Request $request)
    {
        $position = [];
        if (isset($request->category)) {
            $category_id = $request->category;
            $ctg = \App\Models\Category::find($category_id);
            foreach ($ctg->positions as $psn) {
                $position[] = $psn->id;
            }
        } else {
            // go select category
            // return redirect()->route('categories.index');
            $category_id = 0;
        }

        $positions = \App\Models\Position::where(
            "author_id",
            "=",
            Auth::id()
        )
        ->orderBy('id','DESC')
        ->get();
        $categories = \App\Models\Category::where(
            "author_id",
            "=",
            Auth::id()
        )->get();
       // return    $categories;
        return view(
            "blanks.create",
            compact("categories", "positions", "position", "category_id")
        );
    }

    public static function itemstat($item, $gotime)
    {
        if (session("itemtt_" . $item->id) == null) {
            Session::put("itemtt_" . $item->id, $gotime);
        }
    }
    //store
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "string",
            "tcheme" => "string",
            "description" => "string",
            "start"=>"integer",
            //    "categories" => "nullable|json",
            //    "positions" => "nullable|json",
        ]);
        //  return $request;
        if (!isset($request->parent_id)) {
            $parent_id = 0;
        } else {
            $parent_id = $request->parent_id;
        }
        $blank = new \App\Models\Blank();
        $blank->name = $request->name;
        $blank->description = $request->description;
        $blank->color = $request->color;
        $blank->start = $request->start;
        Session::put("color_bp", $request->color);
        // add author_id
        $blank->author_id = Auth::id();
        // add tcheme
        $blank->tcheme = $request->tcheme;
        //    'status',
        $blank->status = $request->status;
        Session::put("status", $request->status);
        $blank->parent_id = $parent_id;
        $blank->save();
        $blank->categories()->sync($request->categories);
        $blank->positions()->sync($request->positions);
        if (isset($request->items)) {
            $blank->items()->sync($request->items);
        }
        $next = 1;
        foreach ($blank->items as $itms) {
            DB::table("blank_item")
                ->where("blank_id", "=", $blank->id)
                ->where("item_id", "=", $itms->id)
                ->update(["order" => $next]);
            $next++;
        }
        return redirect()->route("blanks.show", $blank->id);
    }
    //show
    public function show($id)
    {
        $blank = \App\Models\Blank::find($id);
        Session::put(["blank"=> $id]);
        $api_token = Auth::user()->api_token;
        if ($blank->author_id == Auth::id()) {
            return view("blanks.show", compact("blank", "api_token"));
        } else {
            return view("blanks.show_guest", compact("blank"));
        }
    }

    public function form_WP($blank)
    {
        $work_items = [];
        $order_blank = 1;
        if (!$this->trans_buy_blank($blank, 0.01, 1)) {
            return back();
        }
        // + стартовые
        foreach ($blank->startconditions as $start_position) {
            $work_items[$order_blank] = [
                "type" => "start",
                "content" => $start_position,
            ];
            $order_blank++;
        }

        // + итемс
        foreach ($blank->items as $item) {
            $work_items[$order_blank] = [
                "type" => "item",
                "content" => $item,
            ];
            if ($item->items()->count() > 0) {
                foreach ($item->items as $itm) {
                    $work_items[$order_blank] = [
                        "type" => "item",
                        "content" => $itm,
                    ];
                    $order_blank++;
                }
            }
            $order_blank++;
        }
        // + финиш
        foreach ($blank->finishconditions as $fin_position) {
            $work_items[$order_blank] = [
                "type" => "finish",
                "content" => $fin_position,
            ];
            $order_blank++;
        } // сохраняем в сессию
        session([
            "wblank_" . $blank->id => $work_items,
        ]);
        return $work_items;
    }

    public function work_blankWP($id, Request $request)
    {
        // Without Project
        $blank = \App\Models\Blank::find($id);
        Session::put(["blank"=> $id]);
        if (isset($request->item) && $request->item == 0) {
            // формируем полный список пунктов БП
            $work_items = $this->form_WP($blank);
            $order_item = 1;
            Session::put("timerStart", time());
        } else {
            $work_items = session("wblank_" . $blank->id);
            $order_item = $request->item;
        }

        if (isset($work_items[$order_item])) {
            $view_item = $work_items[$order_item];
        } else {
            $view_item["type"] = "stat";
        }
        // return $order_item;
        // включить статистику
        if ($view_item["type"] == "start") {
            return view("blanks.start", [
                "start_position" => $view_item["content"],
                "order" => $order_item,
                "blank" => $blank,
                "without_project" => 1,
            ]);
        } elseif ($view_item["type"] == "finish") {
            return view("blanks.finishC", [
                "finish_position" => $view_item["content"],
                "order" => $order_item,
                "blank" => $blank,
                "without_project" => 1,
            ]);
        } elseif ($view_item["type"] == "item") {
            $item = $view_item["content"];
            $dtime = time() - session("timerStart"); //время затраченое на выполнения пункта
            Session::put("itemtt_" . $item->id, $dtime);
            Session::put("timerStart", time());
            return view("blanks.item", [
                "content" => $item,
                "order" => $order_item,
                "blank" => $blank,
                "without_project" => 1,
            ]);
        } else {
            $sss = Session::all();
            $itemsdata = [];
            foreach ($sss as $key => $val) {
                $it_id = explode("itemtt_", $key);
                if (count($it_id) > 1) {
                    $itemsdata[] = $this->addtime($it_id[1], $val);
                    Session::forget($key);
                }
            }
            Session::forget("finish_positions" . $id);
            Session::forget("start_positions" . $id);
            $tmr = session("tmr");
            Session::forget("tmrstart");
            return view("blanks.finish", compact("blank", "tmr", "itemsdata"));
        }
    }
    public function type_blanks_project($project, $type = 0)
    {
        
       $work_project = \App\Models\Project::find( $project);
        $count_author=DB::table("project_blank")
        ->where('project_id',$work_project->id)
        ->where('author_id',$work_project->author_id)
        ->count();
        $count_user=DB::table("project_blank")
        ->where('project_id',$work_project->id)
        ->where('author_id',Auth::id())
        ->count();
        if($count_author!== $count_user){
            DB::table("project_blank")
            ->where('project_id',$work_project->id)
            ->where('author_id',Auth::id())
            ->where('author_id',"!==",$work_project->author_id)
            ->delete();
            $order=1;
            foreach(DB::table("project_blank")
            ->where('project_id',$work_project->id)
            ->where('author_id',$work_project->author_id)->get() as $project_blank){
              //  return $project_blank;
                $pbn= new \App\Models\ProjectBlank;
                $pbn->order= $order;
                $pbn->type=0;
                $pbn->author_id=Auth::id();
                $pbn->project_id=$work_project->id;
                $pbn->blank_id=$project_blank->blank_id;
                $pbn->save();
                $order++;
               }
        }
        $work_blanks=  DB::table("project_blank")
        ->where('project_id',$work_project->id)
        ->where('author_id',Auth::id())
        ->get();
        $wbls = [];
        foreach ($work_blanks as $blank) {
            if ($blank->type == $type) {
                $wbls[] = [
                    \App\Models\Blank::find($blank->blank_id),
                    "pivot"=>["type"=>$type,"order"=>$blank->order]
            ];
            }
        }
        if ($wbls !== []) {
            return $wbls;
        } else {
            return false;
        }
    }
    public function form_P($project)
    {
      // return $this->type_blanks_project($project->id, 0);
        if ($blanks = $this->type_blanks_project($project->id, 0)) {
       //  return   $blanks[0]["pivot"]["order"];//->pivot->order ;
            $project_order = $blanks[0]["pivot"]["order"];
            $blank = $blanks[0][0];
            Session::put("order_project_item", $project_order);
            Session::put("work_blank_project", $blank);
            $work_now = [
                "project" => $project,
                "blank" => $blank,
                "project_order" => $project_order,
            ];
          //  return $this->trans_buy_blank($blank, 0.01, 1);
            if (!$this->trans_buy_blank($blank, 0.01, 1)) {
                return back();
            }

            session()->put("work_now", $work_now);
        }
       
        $work_items = [];
        $order_blank = 1;
        // + стартовые
        foreach ($blank->startconditions as $start_position) {
            $work_items[$order_blank] = [
                "type" => "start",
                "content" => $start_position,
            ];
            $order_blank++;
        }
        // + итемс
        foreach ($blank->items as $item) {
            $work_items[$order_blank] = [
                "type" => "item",
                "content" => $item,
            ];
            if ($item->items()->count() > 0) {
                foreach ($item->items as $itm) {
                    $work_items[$order_blank] = [
                        "type" => "item",
                        "content" => $itm,
                    ];
                    $order_blank++;
                }
            }
            $order_blank++;
        }
        // + финиш
        foreach ($blank->finishconditions as $fin_position) {
            $work_items[$order_blank] = [
                "type" => "finish",
                "content" => $fin_position,
            ];
            $order_blank++;
        } // сохраняем в сессию
        session([
            "wblank_" . $blank->id => $work_items,
        ]);
        return $work_items;
    }
    public function work_blankP($id, Request $request)
    {
        // Without Project
        $project = \App\Models\Project::find($id);
        $prject_finish = 0;
        if (isset($request->item) && $request->item == 0) {
            // формируем полный список пунктов БП
            $order_item = 1;
            $work_items = $this->form_P($project);
            Session::put("wbproject_" . $project->id, $work_items);
            Session::put("timerStart", time());
        } else {
            $work_items = session("wbproject_" . $project->id);
            $order_item = $request->item;
        }
     // return   $work_items;
      //return 
      $blank = session("work_blank_project");

        if (isset($work_items[$order_item])) {
            $view_item = $work_items[$order_item];
        } else {
            $view_item["type"] = "stat";
        }

        // включить статистику
        //  return $view_item['type'];
        if ($view_item["type"] == "start") {
            // return $order_item;
            return view("blanks.start", [
                "start_position" => $view_item["content"],
                "order" => $order_item,
                "blank" => $blank,
                "without_project" => 0,
            ]);
        } elseif ($view_item["type"] == "finish") {
            return view("blanks.finishC", [
                "finish_position" => $view_item["content"],
                "order" => $order_item,
                "blank" => $blank,
                "without_project" => 0,
            ]);
        } elseif ($view_item["type"] == "item") {
            $item = $view_item["content"];
            $dtime = time() - session("timerStart"); //время затраченое на выполнения пункта
            Session::put("itemtt_" . $item->id, $dtime);
            Session::put("timerStart", time());
            return view("blanks.item", [
                "content" => $item,
                "order" => $order_item,
                "blank" => $blank,
                "without_project" => 0,
            ]);
        } elseif ($prject_finish == 1) {
            return view("project.show", $project->id,["order" => $order_item,]);
        } else {
            $sss = Session::all();
            $itemsdata = [];
            foreach ($sss as $key => $val) {
                $it_id = explode("itemtt_", $key);
                if (count($it_id) > 1) {
                    $itemsdata[] = $this->addtime($it_id[1], $val);
                    Session::forget($key);
                }
            }
            Session::forget("finish_positions" . $id);
            Session::forget("start_positions" . $id);
            $tmr = session("tmr");
            Session::forget("tmrstart");
           // $order= $order_item;
            return view(
                "blanks.finish",
                compact("blank", "tmr", "itemsdata", "project","order_item")
            );
        }
    }
    public function work_blankPG($id, Request $request)
    {
        // Without Project
        $project = \App\Models\Project::find($id);
        $prject_finish = 0;
        if (isset($request->item) && $request->item == 0) {
            // формируем полный список пунктов БП
            $order_item = 1;
            $work_items = $this->form_P($project);
            Session::put("wbproject_" . $project->id, $work_items);
            Session::put("timerStart", time());
    
        } else {
 
            $work_items = session("wbproject_" . $project->id);
            $order_item = $request->item;
        }

        $blank = session("work_blank_project");

        if (isset($work_items[$order_item])) {
            $view_item = $work_items[$order_item];
        } else {
            $view_item["type"] = "stat";
        }

        // включить статистику
        //  return $view_item['type'];
        if ($view_item["type"] == "start") {
            // return $order_item;
            return view("blanks.start", [
                "start_position" => $view_item["content"],
                "order" => $order_item,
                "blank" => $blank,
                "without_project" => 0,
            ]);
        } elseif ($view_item["type"] == "finish") {
            return view("blanks.finishC", [
                "finish_position" => $view_item["content"],
                "order" => $order_item,
                "blank" => $blank,
                "without_project" => 0,
            ]);
        } elseif ($view_item["type"] == "item") {
            $item = $view_item["content"];
            $dtime = time() - session("timerStart"); //время затраченое на выполнения пункта
            Session::put("itemtt_" . $item->id, $dtime);
            Session::put("timerStart", time());
            return view("blanks.item", [
                "content" => $item,
                "order" => $order_item,
                "blank" => $blank,
                "without_project" => 0,
            ]);
        } elseif ($prject_finish == 1) {
            return view("project.show", $project->id);
        } else {
            $sss = Session::all();
            $itemsdata = [];
            foreach ($sss as $key => $val) {
                $it_id = explode("itemtt_", $key);
                if (count($it_id) > 1) {
                    $itemsdata[] = $this->addtime($it_id[1], $val);
                    Session::forget($key);
                }
            }
            Session::forget("finish_positions" . $id);
            Session::forget("start_positions" . $id);
            $tmr = session("tmr");
            Session::forget("tmrstart");
            return view(
                "blanks.finishG",
                compact("blank", "tmr", "itemsdata", "project")
            );
        }
    }
    public function work_return(Request $request, $blank)
    {
        $blank = \App\Models\Blank::find($blank);
        Session::put(["blank"=>$blank]);
        $work_now = session("work_now");
        $project = $work_now["project"];
        $work_now["blank"] = $blank;
        $work_now["project"] = $project;
        Session::put("work_now", $work_now);
        if (
            session("start_positions" . $blank->id) == null &&
            session("start_positions" . $blank->id) !== []
        ) {
            $start_positions = $blank->startconditions;
            $mass_start_positions = [];
            foreach ($start_positions as $start_position) {
                $mass_start_positions[] = $start_position;
            }
            session(["start_positions" . $blank->id => $mass_start_positions]);
        }
        if (
            session("finish_positions" . $blank->id) == null &&
            session("finish_positions" . $blank->id) !== []
        ) {
            $finish_positions = $blank->finishconditions;
            $mass_finish_positions = [];
            foreach ($finish_positions as $finish_position) {
                $mass_finish_positions[] = $finish_position;
            }
            session([
                "finish_positions" . $blank->id => $mass_finish_positions,
            ]);
        }
        return $this->toStartView($blank);
        return $this->toWorkView($blank, 1); // открываем blanks.work
    }

    public function next($blank, $timerStart)
    {
        // если сессии нет то создаем и ставим нули для старта и финиша

        $order = 0;
        $project = 0;
        $item_priv_id = 0;
        $item_priv = [];
        if ($blank->items->count() > 0) {
            $item = \App\Models\Item::find(
                $blank->items->first()->pivot->item_id
            );
            $order = $blank->items->where("pivot.order", ">", $order)->first()
                ->pivot->order;
        } else {
            return false;
        }
        if ($blank->items->where("pivot.order", ">", $order)->count() > 0) {
            $item_next = \App\Models\Item::find(
                $blank->items->where("pivot.order", ">", $order)->first()->pivot
                    ->item_id
            );
            $item_next_id = $item_next->id;
        } else {
            $item_next = [];
            $item_next_id = 0;
        }
        $work_now = [
            "item_next" => $item_next,
            "item_next_id" => $item_next_id,
            "item" => $item,
            "item_id" => $item->id,
            "item_priv" => $item_priv,
            "item_priv_id" => $item_priv_id,
            "order" => $order,
            "blank" => $blank,
            "project" => $project,
        ];
        Session::put("work_now", $work_now);
        if (session("work_now") !== null) {
            // если есть то берем из сессии

            $work_now = session("work_now");
            if ($work_now["item_next_id"] == 0) {
                return false;
            }

            $blank = $work_now["blank"];
            $pr_order = $work_now["order"];
            $order = $pr_order + 1;
            $next_order = $order + 2;

            if (
                $work_now["blank"]->items
                    ->where("pivot.order", "=", $order)
                    ->count() > 0
            ) {
                $item = $work_now["blank"]->items
                    ->where("pivot.order", "=", $order)
                    ->first();
            } else {
                return false;
            }

            if (
                $work_now["blank"]->items
                    ->where("pivot.order", "=", $next_order)
                    ->count() > 0
            ) {
                $item_next = $work_now["blank"]->items
                    ->where("pivot.order", "=", $next_order)
                    ->first();
                $item_next_id = $item_next->id;
            } else {
                $item_next = [];
                $item_next_id = 0;
            }
            if (
                $work_now["blank"]->items
                    ->where("pivot.order", "=", $pr_order)
                    ->count() > 0
            ) {
                $item_priv = $work_now["blank"]->items
                    ->where("pivot.order", "=", $pr_order)
                    ->first();
                $item_priv_id = $item_priv->id;
            } else {
                $item_priv = [];
                $item_priv_id = 0;
            }
            if ($work_now["project"] !== 0) {
                $project = $work_now["project"];
                DB::table("work_project")
                    ->where("id", "=", $work_now["project"])
                    ->update([
                        "type" => 1,
                        "item_id" => $item->id,
                        "updated_at" => now(),
                    ]);
            } else {
                $project = 0;
            }
        }

        $work_now["item_next"] = $item_next;
        $work_now["item_next_id"] = $item_next_id;
        $work_now["item"] = $item;
        $work_now["item_priv"] = $item_priv;
        $work_now["item_priv_id"] = $item_priv_id;
        $work_now["order"] = $order;
        $work_now["blank"] = $blank;
        $work_now["project"] = $project;

        // "startitem" => $mass_startconditions,

        // "finishitem" => $mass_finishconditions,
        if (isset($timerStart)) {
            $gotime = time() - $timerStart;
        } else {
            $gotime = 0;
        }
        // если итем последний то бросаем на финиш
        $timerStart = time();
        $this->itemstat($item, $gotime);
        Session::put("work_now", $work_now);
        return true;
    }
    public function orderPut($blank)
    {
        if ($blank->author_id !== Auth::id()) {
            return back();
        }
        if ($blank->items->where("pivot.order", "=", null)->count() > 0) {
            $orderNull = $blank->items->where("pivot.order", "=", null);
            $maxorder =
                $blank->items->where("pivot.order", "!=", null)->max() + 1;
            foreach ($orderNull as $oitems) {
                $oitems->pivot->update(["order" => $maxorder]);
                $oitems->save();
                $maxorder++;
            }
        }
    }
    public function work(Request $request, $id)
    {
        // начинаем считать время , сброс и перезапись при определении текущего итема
        if (session("timerStart") == null) {
            Session::put("timerStart", time());
        }

        $blank = \App\Models\Blank::find($id);
        Session::put(["blank"=>$blank]);
        if (
            session("start_positions" . $id) == null &&
            session("start_positions" . $id) !== []
        ) {
            $start_positions = $blank->startconditions;
            $mass_start_positions = [];
            foreach ($start_positions as $start_position) {
                $mass_start_positions[] = $start_position;
            }
            session(["start_positions" . $id => $mass_start_positions]);
        }
        if (
            session("finish_positions" . $id) == null &&
            session("finish_positions" . $id) !== []
        ) {
            $finish_positions = $blank->finishconditions;
            $mass_finish_positions = [];
            foreach ($finish_positions as $finish_position) {
                $mass_finish_positions[] = $finish_position;
            }
            session(["finish_positions" . $id => $mass_finish_positions]);
        }

        //return session("start_positions" . $id);
        // Проверяем наличие стартовых позиций в сессии
        $this->toStartView($blank);
        $this->orderPut($blank); // если у нас есть пустые ордера то заполняем их

        //  return 3421;
        if (!isset($request->finish)) {
            // if(!isset($request->page))
            return $this->toWorkView($blank, $request->page);
        }

        if (
            Session::has("finish_positions" . $id) &&
            count(Session::get("finish_positions" . $id)) > 0
        ) {
            // Получаем первый элемент из сессии
            $finish_positions = Session::pull("finish_positions" . $id);
            $finish_position = $finish_positions[0];
            // Удаляем первый элемент из сессии и записываем обратно
            if (count($finish_positions) > 1) {
                $finish_positions = array_slice($finish_positions, 1);
            } else {
                $finish_positions = [];
            }
            Session::put("finish_positions" . $id, $finish_positions);

            // Передаем стартовую позицию во view
            return view("blanks.finishC", [
                "finish_position" => $finish_position,
                "progress" => 0,
                "progressPR" => 0,
                "order" => 0,
                "blank" => $id,
            ]);
        }
        return redirect()->route("blanks.finish", $id);
    }
    public function toStartView($blank)
    {
        if (
            Session::has("start_positions" . $blank->id) &&
            count(Session::get("start_positions" . $blank->id)) > 0
        ) {
            // Получаем первый элемент из сессии
            $start_positions = Session::pull("start_positions" . $blank->id);
            $start_position = $start_positions[0];
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
                "blank" => $blank,
            ]);
        }
    }
    public function toStartViewWP($blank)
    {
        if (
            Session::has("start_positions" . $blank->id) &&
            count(Session::get("start_positions" . $blank->id)) > 0
        ) {
            // Получаем первый элемент из сессии
            $start_positions = Session::pull("start_positions" . $blank->id);
            $start_position = $start_positions[0];
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
                "blank" => $blank,
                "without_project" => 1,
            ]);
        }
    }
    public function toWorkView($blank, $page)
    {
        $items = $blank
            ->items()
            ->orderby("blank_item.order", "asc")
            ->paginate(1);
        $order = $items->currentPage();
        $item = $items->first();
        $dtime = time() - session("timerStart"); //время затраченое на выполнения пункта
        Session::put("itemtt_" . $item->id, $dtime);
        Session::put("timerStart", time());
        if ($order > 1) {
            $prevItem = $items->pop();
        } else {
            $prevItem = null;
        }
        if ($order < $items->total()) {
            $nextItem = $items->shift();
        } else {
            $nextItem = null;
        }
        ///////////////////////////////////////////////////////////
        $progress = [
            "items_count" => $items->total(),
            "order" => $items->currentPage(),
            "pr" => ceil($items->currentPage() / ($items->total() / 100)),
        ];
        if (session("work_now") !== null && session("withoutProject") == null) {
            $work_now = session("work_now");
            $project = $work_now["project"];
        } elseif (session("work_now") == null) {
            $project = 0;
        } elseif (session("withoutProject") !== null) {
            $project = 0;
        }
        Session::put("work_now", [
            "blank" => $blank,
            "order" => $page,
            "project" => $project,
        ]);
        if (isset($project) && $project !== 0) {
            $progressPR = \App\Http\Controllers\ProjectController::progress(
                $project
            );
        } else {
            $progressPR = 0;
        }
        $without_project = 0;
        return view(
            "blanks.work",
            compact(
                "blank",
                "item",
                "items",
                "order",
                "nextItem",
                "prevItem",
                "progress",
                "progressPR",
                "without_project"
            )
        );
    }
    public function toWorkViewWP($blank, $page)
    {
        $items = $blank
            ->items()
            ->orderby("blank_item.order", "asc")
            ->paginate(1);

        $order = $items->currentPage();
        $item = $items->first();

        $dtime = time() - session("timerStart"); //время затраченое на выполнения пункта
        Session::put("itemtt_" . $item->id, $dtime);
        Session::put("timerStart", time());
        if ($order > 1) {
            $prevItem = $items->pop();
        } else {
            $prevItem = null;
        }
        if ($order < $items->total()) {
            $nextItem = $items->shift();
        } else {
            $nextItem = null;
        }
        ///////////////////////////////////////////////////////////
        $progress = [
            "items_count" => $items->total(),
            "order" => $items->currentPage(),
            "pr" => ceil($items->currentPage() / ($items->total() / 100)),
        ];
        $progressPR = 0;
        $without_project = 0;
        return view(
            "blanks.work",
            compact(
                "blank",
                "item",
                "items",
                "order",
                "nextItem",
                "prevItem",
                "progress",
                "progressPR",
                "without_project"
            )
        );
    }
    public function finish(Request $request, $id)
    {
        $sss = Session::all();
        $itemsdata = [];
        foreach ($sss as $key => $val) {
            $it_id = explode("itemtt_", $key);
            if (count($it_id) > 1) {
                $itemsdata[] = $this->addtime($it_id[1], $val);
                Session::forget($key);
            }
        }
        Session::forget("finish_positions" . $id);
        Session::forget("start_positions" . $id);
        $blank = \App\Models\Blank::find($id);
        Session::put(["blank"=>$id]);
        $tmr = session("tmr");
        Session::forget("tmrstart");
        Session::forget("order_project_item");
        // return $itemsdata;
        return view("blanks.finish", compact("blank", "tmr", "itemsdata"));
    }
    public function finishG(Request $request, $id)
    {
        $sss = Session::all();
        $itemsdata = [];
        foreach ($sss as $key => $val) {
            $it_id = explode("itemtt_", $key);
            if (count($it_id) > 1) {
                $itemsdata[] = $this->addtime($it_id[1], $val);
                Session::forget($key);
            }
        }
        Session::forget("finish_positions" . $id);
        Session::forget("start_positions" . $id);
        $blank = \App\Models\Blank::find($id);
        Session::put(["blank"=>$id]);
        $tmr = session("tmr");
        Session::forget("tmrstart");
        Session::forget("order_project_item");
        // return $itemsdata;
        return view("blanks.finishG", compact("blank", "tmr", "itemsdata"));
    }
    public function addtime($itemId, $sek)
    {
        //return $itemId;
        $item = \App\Models\Item::find($itemId);

        if ($item->real_time !== null) {
            $real_time = $item->real_time;
        } else {
            $real_time = 1;
        }
        $item->real_time = $sek;
        $item->avoid_time = 1 + ($real_time + $sek) / 2;
        $item->save();
        $pr = 1 + $sek / ($item->avoid_time / 100);
        return [
            $item->name,
            $item->real_time,
            $item->avoid_time,
            $pr,
            $item->problems,
        ];
    }
    //edit
    public function edit($id)
    {
        $blank = \App\Models\Blank::find($id);
        Session::put(["blank"=>$id]);
        $categories = \App\Models\Category::where(
            "author_id",
            "=",
            Auth::id()
        )
        ->orderby('name', 'asc')
        ->get();
        $positions = \App\Models\Position::where(
            "author_id",
            "=",
            Auth::id()
        )
         ->orderby('name', 'asc')
        ->get();
       // return  $categories;
        return view("blanks.edit", compact("blank", "categories", "positions"));
    }
    //update
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "string",
            "tcheme" => "string",
            "description" => "string",
            "start"=> "integer",
            //    "categories" => "json",
            //    "positions" => "json",
        ]);
        $blank = \App\Models\Blank::find($id);
        Session::put(["blank"=>$id]);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }
        $blank->name = $request->name;
        $blank->description = $request->description;
        $blank->color = $request->color;
        $blank->start = $request->start;
        $blank->tcheme = $request->tcheme;
        $blank->status = $request->status;
        Session::put("status", $request->status);
        $blank->save();
        $blank->categories()->sync($request->categories);
        $blank->positions()->sync($request->positions);
        if( $blank->status == 2 ){
            $this-> go_to_free($blank);
        }
       
        return redirect()->route("blanks.show",$id);
    }
    //destroy
    public function go_to_free($blank){
       foreach( $blank->categories as $category){
        $category->status=2;
        $category->save();
       }
     //  return $blank->positions;
        foreach( $blank->positions as $position){
          
        $position->status=2;
        $position->save();
       }
     //   return $blank->positions;
       foreach( $blank->startconditions as $startcondition){
        $startcondition->status=2;
        $startcondition->save();
       } 
        foreach( $blank->finishconditions as $finishcondition){
        $finishcondition->status=2;
        $finishcondition->save();
       } 
    }
    public function destroy($id)
    {
        $blank = \App\Models\Blank::find($id);
        Session::put(["blank"=>$id]);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }
        $blank->delete();
        return back();
        return redirect()->route("blanks.index");
    }
    // command php artisan make view

    public function copy(Request $request)
    {
        $this->validate($request, [
            "blank_id" => "integer",
        ]);
        $blank = \App\Models\Blank::find($request->blank_id);
       
        if ($blank->author_id !== Auth::id()) {
            return back();
        }
        $newblank = new \App\Models\Blank();

        $newblank->name = $blank->name;
        $newblank->description = $blank->description;
        $newblank->color = $blank->color;
        $newblank->author_id = Auth::id();
        // add tcheme
        $newblank->tcheme = $blank->tcheme;
        //    'status',
        $newblank->status = $blank->status;
        $newblank->parent_id = $blank->parent_id;
        $newblank->save();
        Session::put(["blank"=> $newblank->id]);
        $newblank->categories()->sync($blank->categories);
        $newblank->startconditions()->sync($blank->startconditions);
        $newblank->finishconditions()->sync($blank->finishconditions);
        $newblank->stamps()->sync($blank->stamps);
        $newblank->positions()->sync($blank->positions);
        if (isset($blank->items)) {
            $newblank->items()->sync($blank->items);
        }

        $next = 1;
        foreach ($blank->items as $itms) {
            DB::table("blank_item")
                ->where("blank_id", "=", $newblank->id)
                ->where("item_id", "=", $itms->id)
                ->update(["order" => $next]);
            $next++;
        }
        return back();
    }
    public function buy_blank($blank_id, $blok = 0)
    {
        $blank = \App\Models\Blank::find($blank_id);
        Session::put(["blank"=> $blank_id]);
        if (
            \App\Models\Blank::where("author_id", Auth::id())
                ->where("parent_id", $blank_id)
                ->count() > 0 &&
            $blok == 0
        ) {
            return redirect()->route(
                "blanks.show",
                \App\Models\Blank::where("author_id", Auth::id())
                    ->where("parent_id", $blank_id)
                    ->first()->id
            );
        }

        if ($blank->author_id !== Auth::id()) {
            //списываем 1 $
            if (!$this->trans_buy_blank($blank, 1, 2)) {
                return back();
            }
        }
        $newblank = new \App\Models\Blank();
        $newblank->fill($blank->getAttributes());
        $newblank->author_id = Auth::id();
        $newblank->status = 0;
        $newblank->parent_id = $blank->id;
        $newblank->save();
        if ($blank->categories) {
          //  $new_categories = $this->buy_categories($blank->categories);
          //  $newblank->categories()->sync($new_categories);
          $newblank->categories()->sync($blank->categories);
        }
        if ($blank->startconditions) {
            $new_startconditions = $this->buy_startconditions(
                $blank->startconditions
            );
            $newblank->startconditions()->sync($new_startconditions);
        }
        if ($blank->finishconditions) {
            $new_finishconditions = $this->buy_finishconditions(
                $blank->finishconditions
            );
            $newblank->finishconditions()->sync($new_finishconditions);
        }
        if ($blank->stamps) {
            $new_stamps = $this->buy_stamps($blank->stamps);
            $newblank->stamps()->sync($new_stamps);
        }
        if ($blank->positions) {
           // $new_positions = $this->buy_positions($blank->positions);
          //  $newblank->positions()->sync($new_positions);
          $newblank->positions()->sync($blank->positions);
        }
        if ($blank->items) {
            $new_items = $this->buy_items($blank->items, 0);
            if (isset($new_items)) {
                $newblank->items()->sync($blank->items);
            }
            $next = 1;
            foreach ($new_items as $itms) {
                DB::table("blank_item")
                    ->where("blank_id", "=", $newblank->id)
                    ->where("item_id", "=", $itms)
                    ->update(["order" => $next]);
                $next++;
            }
        }
        return redirect()->route("blanks.show", $newblank->id);
    }
    public function buy_blank_for_project($blank_id)
    {
        $blank = \App\Models\Blank::find($blank_id);
        Session::put(["blank"=> $blank_id]);
        if ($blank->author_id !== Auth::id()) {
            //списываем 1 $
            if (!$this->trans_buy_blank($blank, 1, 2)) {
                return false;
            }
            $newblank = new \App\Models\Blank();
            $newblank->fill($blank->getAttributes());
            $newblank->author_id = Auth::id();
            $newblank->status = 0;
            $newblank->parent_id = $blank->id;
            $newblank->save();
            if ($blank->categories) {

               // $new_categories = $this->buy_categories($blank->categories);
               // $newblank->categories()->sync($new_categories);
               $newblank->categories()->sync($blank->categories);
            }
            if ($blank->startconditions) {
                $new_startconditions = $this->buy_startconditions(
                    $blank->startconditions
                );
                $newblank->startconditions()->sync($new_startconditions);
            }
            if ($blank->finishconditions) {
                $new_finishconditions = $this->buy_finishconditions(
                    $blank->finishconditions
                );
                $newblank->finishconditions()->sync($new_finishconditions);
            }
            if ($blank->stamps) {
                $new_stamps = $this->buy_stamps($blank->stamps);
                $newblank->stamps()->sync($new_stamps);
            }
            if ($blank->positions) {
              //  $new_positions = $this->buy_positions($blank->positions);
                $new_positions=$blank->positions;
                $newblank->positions()->sync($new_positions);
            }
            if ($blank->items) {
                $new_items = $this->buy_items($blank->items, 0);
                if (isset($new_items)) {
                    $newblank->items()->sync($blank->items);
                }
                $next = 1;
                foreach ($new_items as $itms) {
                    DB::table("blank_item")
                        ->where("blank_id", "=", $newblank->id)
                        ->where("item_id", "=", $itms)
                        ->update(["order" => $next]);
                    $next++;
                }
            }
            return $newblank->id;
        } else {
            return $blank->id;
        }
    }

    public function trans_buy_blank($blank, $price = 1, $type = 2)
    {
        ///////////////////////////////////////////////////
        // transaction
        if ($blank->author_id !== Auth::id()) {
            // вставить проверку количество использований
            //если тип = 1 использование оригинала $blank->start
            if ($type = 1) {
                if (
                    \App\Models\StatBlank::where(
                        "blank_id",
                        $blank->id
                    )->count() < $blank->start
                ) {
                    return true;
                }
            }
            return \App\Models\StatBlank::where(
                "blank_id",
                $blank->id
            )->get();
            // проверить
            // сколько наличности
            if (Auth::user()->suns >= $price) {
                $tract = new \App\Models\Transaction();
                $tract->user_id = Auth::id();
                $tract->author_id = $blank->author_id;
                $tract->blank_id = $blank->id;
                $tract->money = $price;
                $tract->type = $type;
                $tract->system = $price * 0.1;
                $User = \App\Models\User::find(Auth::id());
                $User->suns -= $price;
                if ($blank->parent_id !== 0) {
                    $this->trans_buy_blank(
                        \App\Models\Blank::find($blank->parent_id),
                        $price * 0.2,
                        $type = 3
                    );
                    $Author = \App\Models\User::find($blank->author_id);
                    $Author->suns += $price * 0.7;
                } else {
                    $Author = \App\Models\User::find($blank->author_id);
                    $Author->suns += $price * 0.9;
                }
                $tract->save();
                $User->save();
                $Author->save();
                return true;
            } else {
                return false;
            }
        }
        return true;
        ///////////////////////////////////////////////////
    }
    public function buy_items($items, $parent_id = 0)
    {
        $new_items = [];
        foreach ($items as $item) {
            $my_item = \App\Models\Item::where("author_id", Auth::id())
                ->where("content", $item->content)
                ->where("name", $item->name);

            if ($my_item->count() > 0) {
                $new_items[] = $my_item->first()->id;
                $parent = $my_item;
            } else {
                $new_item = new \App\Models\Item();
                // Скопировать все свойства модели, используя метод getAttributes()
                $new_item->fill($item->getAttributes());
                // заменить важные
                $new_item->author_id = Auth::id();
                $new_item->parent_id = $parent_id;
                $new_item->updated_at = now();
                $new_item->save();
                $new_items[] = $new_item->id;
                $parent = $new_item->id;
            }
            if ($item->items()->count() > 0) {
                $this->buy_items($item->items, $parent);
            }
        }
        return $new_items;
    }
    public function buy_positions($positions)
    {
        $new_positions = [];
        foreach ($positions as $position) {
            $my_position = \App\Models\Position::where("author_id", Auth::id())
                ->where("lang", $position->lang)
                ->where("abv", $position->abv)
                ->where("description", $position->description)
                ->where("name", $position->name);
            if ($my_position->count() > 0) {
                $new_positions[] = $my_position->first()->id;
            } else {
                $new_position = new \App\Models\Position();
                // Скопировать все свойства модели, используя метод getAttributes()
                $new_position->fill($position->getAttributes());
                // заменить важные
                $new_position->author_id = Auth::id();
                $new_position->updated_at = now();
                $new_position->save();
                $new_positions[] = $new_position->id;
            }
        }
        return $new_positions;
    }
    public function buy_stamps($stamps)
    {
        $new_stamps = [];
        foreach ($stamps as $stamp) {
            $my_stamp = \App\Models\Stamp::where("author_id", Auth::id())
                ->where("lang", $stamp->lang)
                ->where("content", $stamp->content);
            if ($my_stamp->count() > 0) {
                $new_stamps[] = $my_stamp->first()->id;
            } else {
                $new_stamp = new \App\Models\Stamp();
                // Скопировать все свойства модели, используя метод getAttributes()
                $new_stamp->fill($stamp->getAttributes());
                // заменить важные
                $new_stamp->author_id = Auth::id();
                $new_stamp->updated_at = now();
                $new_stamp->save();
                $new_stamps[] = $new_stamp->id;
            }
        }
        return $new_stamps;
    }
    public function buy_categories($categories)
    {
        $new_categories = [];
        foreach ($categories as $cat) {
            $my_cat = \App\Models\Category::where("author_id", Auth::id())
                ->where("lang", $cat->lang)
                ->where("name", $cat->name)
                ->where("slug", $cat->slug)
                ->where("description", $cat->description);
            if ($my_cat->count() > 0) {
                $new_categories[] = $my_cat->first()->id;
            } else {
                $new_cat = new \App\Models\Category();
                // Скопировать все свойства модели, используя метод getAttributes()
                $new_cat->fill($cat->getAttributes());
                // заменить важные
                $new_cat->author_id = Auth::id();
                $new_cat->parent_id = 0;
                $new_cat->updated_at = now();
                $new_cat->save();
                $new_categories[] = $new_cat->id;
            }
        }
        return $new_categories;
    }
    public function buy_startconditions($starts)
    {
        $new_starts = [];
        foreach ($starts as $start) {
            $my_start = \App\Models\StartCondition::where(
                "author_id",
                Auth::id()
            )
                ->where("lang", $start->lang)
                ->where("content", $start->content);
            if ($my_start->count() > 0) {
                $new_starts[] = $my_start->first()->id;
            } else {
                $new_start = new \App\Models\StartCondition();
                // Скопировать все свойства модели, используя метод getAttributes()
                $new_start->fill($start->getAttributes());
                // заменить важные
                $new_start->author_id = Auth::id();
                $new_start->updated_at = now();
                $new_start->save();
                $new_starts[] = $new_start->id;
            }
        }
        return $new_starts;
    }
    public function buy_finishconditions($finishs)
    {
        $new_finishs = [];
        foreach ($finishs as $finish) {
            $my_finish = \App\Models\Finish::where("author_id", Auth::id())
                ->where("lang", $finish->lang)
                ->where("content", $finish->content);
            if ($my_finish->count() > 0) {
                $new_finishs[] = $my_finish->first()->id;
            } else {
                $new_finish = new \App\Models\Finish();
                // Скопировать все свойства модели, используя метод getAttributes()
                $new_finish->fill($finish->getAttributes());
                // заменить важные
                $new_finish->author_id = Auth::id();
                $new_finish->updated_at = now();
                $new_finish->save();
                $new_finishs[] = $new_finish->id;
            }
        }
        return $new_finishs;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class StartConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->my) {
            $my = $request->my;
        } else {
            $my = 0;
        }
        $starts = \App\Models\StartCondition::where(
            "author_id",
            "=",
            Auth::id()
        )
            ->orwhere(function ($query) use ($my) {
                if ($my == 0) {
                    return $query->where("status", "=", 2);
                }
            })
            ->orderBy("id", "desc")
            // ->orwhere('status','=',2)
            ->get();
        return view("start.index", compact("starts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("start.create");
    }
    public function addstart($blank)
    {
        return view("start.create", compact("blank"));
    }
    public function addstartI(Request $request, $item)
    {
        if (isset($request->uni)) {
            $uni = $request->uni;
            return view("start.create", compact("item", "uni"));
        } else {
            return view("start.create", compact("item"));
        }
    }
    public function addstartsB($blank)
    {
        $blank = \App\Models\Blank::find($blank);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }
        // if author blank is current use

        $starts = \App\Models\StartCondition::where(
            "author_id",
            Auth::id()
        )->get();
        return view("start.select", compact("starts", "blank"));
    }
    public function poststartsB(Request $request)
    {
        $strts = $request->strts;
        $blank = \App\Models\Blank::find($request->blank);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }

        if (isset($request->clean) && $request->clean == 1) {
            $blank->startconditions()->detach();
        }
        $max_order = $blank->startconditions->max("pivot.order");
        if ($max_order == null) {
            $max_order = 0;
        }
        $add_strts = [];
        foreach ($strts as $strt) {
            $add_strts[$strt] = [
                "condition_id" => $strt,
                "order" => $max_order + 1,
            ];
            $max_order++;
        }
        $blank->startconditions()->attach($add_strts);
        //return $blank->startconditions;
        return redirect()->route("blanks.show", $blank);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public $badSymbols = ["•", ";"];

    public function AddToBlank($start, $blank = 0, $item = 0)
    {
        if ($blank !== 0 && ($bl = \App\Models\Blank::find($blank))) {
            if ($bl->author_id !== Auth::id()) {
                return redirect()->route("blanks.show", $blank);
            }
            $max_order = DB::table("blank_condition")
                ->where("blank_id", "=", $bl->id)
                ->max("order");
            if ($max_order == null) {
                $max_order = 0;
            }
            $next = $max_order + 1;
            $insertdata = [["condition_id" => $start->id, "order" => $next]];
            $bl->startconditions()->attach($insertdata);
        }
        if ($item !== 0 && ($it = \App\Models\Item::find($item))) {
            if ($it->author_id !== Auth::id()) {
                return redirect()->route("item.show", $item);
            }

            $it->startconditions()->detach();
            $max_order_item_item = DB::table("item_condition")
                ->where("item_id", "=", $item)
                ->max("order");
            if ($max_order_item_item == null) {
                $max_order_item_item = 0;
            }
            $next = $max_order_item_item + 1;
            $insertdata = [["condition_id" => $start->id, "order" => $next]];
            $it->startconditions()->attach($insertdata);
        }
    }
    public function store(Request $request)
    {
        if (!isset($request->separate)) {
            $start = $this->FindStart(
                $request->content,
                $request->lang,
                $request->status
            );
            if (isset($request->blank)) {
                $blank = $request->blank;
            } else {
                $blank = 0;
            }
            if (isset($request->item)) {
                $item = $request->item;
            } else {
                $item = 0;
            }
            $this->AddToBlank($start, $blank, $item);
        } elseif (isset($request->separate)&&$request->separate==1) {
            $cnts = explode("\n", $request->content);
            foreach ($cnts as $content) {
                $content=trim($content);
                // dellete bad symbols
                $cbs= str_replace($this->badSymbols, "", $content);
                // удалить все теги
                $cbs = strip_tags($cbs);
                // удалить все пробелы
				$cbs = str_replace(" ", "", $cbs);
                    
                if($content!==""&&$cbs!=="")
                $start = $this->FindStart(
                    $content,
                    $request->lang,
                    $request->status
                );
                if (isset($request->blank)) {
                    $blank = $request->blank;
                } else {
                    $blank = 0;
                }
                if (isset($request->item)) {
                    $item = $request->item;
                } else {
                    $item = 0;
                }
                $this->AddToBlank($start, $blank, $item);
            }
        }

        if (isset($request->blank)) {
            $this->newOrderBlank(\App\Models\Blank::find($request->blank));
            return redirect()->route("blanks.show", $request->blank);
        }
        if (isset($request->item) && !isset($request->uni)) {
            return redirect()->route("item.show", $request->item);
        }
        if (
            isset($request->item) &&
            isset($request->uni) &&
            $request->uni == $request->item
        ) {
            return redirect()->route("underblank.show", $request->item);
        }

        return redirect()->route("start.index");
    }
    public function FindStart($word, $lang, $status)
    {
        $start = \App\Models\StartCondition::where(
            "content",
            "LIKE",
            $word
        )->first();
        if ($start == null) {
            $start = new \App\Models\StartCondition();
            $start->author_id = Auth::id();
            // language
            if (isset($request->lang)) {
                $start->lang = $lang;
            } else {
                $start->lang = Session::get("locale");
            }
            $start->content = str_replace($this->badSymbols, "", $word);
            $start->status = $status;
            $start->save();
        }
        return $start;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $start = \App\Models\StartCondition::find($id);
        return view("start.show", compact("start"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $start = \App\Models\StartCondition::find($id);
        // if author start is current user

        if ($start->author_id !== Auth::id()) {
            return redirect()->route("start.index");
        }
        if (isset($request->blank)) {
            $blank = $request->blank;
        } else {
            $blank = 0;
        }
        return view("start.edit", compact("start", "blank"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blank = \App\Models\Blank::find($request->blank);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }
        $start = \App\Models\StartCondition::find($id);
        // if author start is current user
        if ($start->author_id !== Auth::id()) {
            return redirect()->route("start.index");
        }
        $start->content = $request->content;
        $start->status = $request->status;
        // save session status
        // language
        if (isset($request->lang)) {
            $start->lang = $request->lang;
        } else {
            $start->lang = Session::get("locale");
        }
        Session::put("status", $request->status);
        $start->save();
        if (isset($request->blank) && $request->blank !== 0) {
            return redirect()->route("blanks.show", $request->blank);
        } else {
            return redirect()->route("start.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $start = \App\Models\StartCondition::find($id);
        // if author start is current user
        if ($start->author_id !== Auth::id()) {
            return redirect()->route("start.index");
        }
        $start->delete();
        return redirect()->route("start.index");
    }
    public function shift_up(Request $request)
    {
        $blank = \App\Models\Blank::find($request->blank);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }
        $blank_id = $request->blank;
        $condition_id = $request->start;
        $order = $request->order;
        $priv_order = $order - 1;

        if ($priv_order > 0) {
            $current = \App\Models\Blank::find($blank_id)
                ->startconditions->where("pivot.order", "<=", $order)
                ->where("pivot.condition_id", "=", $condition_id)
                ->where("pivot.blank_id", "=", $blank_id)
                ->first()->pivot->id;

            $priv = \App\Models\Blank::find($blank_id)
                ->startconditions->where("pivot.order", "<=", $order)
                ->where("pivot.id", "!=", $current)
                ->last()->pivot->id;
            //return [$current,$priv ];

            DB::table("blank_condition")
                ->where("id", "=", $current)
                ->update(["order" => $priv_order]);
            DB::table("blank_condition")
                ->where("id", "=", $priv)
                ->update(["order" => $order]);
        }
        return redirect()->route("blanks.show", [
            "blank" => \App\Models\Blank::find($blank_id),
        ]);
    }
    //  order  shift down
    public function shift_down(Request $request)
    {
        $blank = \App\Models\Blank::find($request->blank);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }
        $blank_id = $request->blank;
        $condition_id = $request->start;
        $order = $request->order * 1;
        $next_order = $order + 1;
        $max_order = $current = \App\Models\Blank::find(
            $blank_id
        )->startconditions->max("pivot.order");
        if ($max_order == null) {
            $max_order = 1;
        }

        if ($next_order <= $max_order) {
            $ct = \App\Models\Blank::find($blank_id)->startconditions->where(
                "pivot.condition_id",
                "=",
                $condition_id
            );
            foreach ($ct as $c) {
                $current = $c->pivot->id;
            }
            $next = \App\Models\Blank::find($blank_id)
                ->startconditions->where("pivot.order", "=", $next_order)
                ->where("pivot.condition_id", "!=", $condition_id)
                ->first()->pivot->id;
            // return [$current, $next , $order , $next_order];
            DB::table("blank_condition")
                ->where("id", "=", $current)
                ->update(["order" => $next_order]);
            DB::table("blank_condition")
                ->where("id", "=", $next)
                ->update(["order" => $order]);
        }
        return redirect()->route("blanks.show", [
            "blank" => \App\Models\Blank::find($blank_id),
        ]);
    }
    public function dell(Request $request)
    {
        $blank = \App\Models\Blank::find($request->blank);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }
        $blank_id = $request->blank;
        $blank = \App\Models\Blank::find($blank_id);
        $condition_id = $request->start;
        $start = \App\Models\StartCondition::find($condition_id);
        $pivot_order = $request->order;

        $blank
            ->startconditions()
            ->wherePivot("order", $pivot_order)
            ->detach($condition_id);
        $this->newOrderBlank($blank);

        return redirect()->route("blanks.show", [
            "blank" => $blank,
        ]);
    }
    public function newOrderBlank($blank)
    {
        $od = 1;
        foreach ($blank->startconditions as $o) {
            $o->pivot->order = $od;
            $o->pivot->save();
            $od++;
        }
    }
    //trashSelect
    public function trashSelect(Request $request){
     $blank=$request->blank;
     //return  $request-> all();
     $start=$request->startcondition;
     foreach($start as $s){
        $this->del_start_from_blank($blank,$s);
     }
     return redirect()->route("blanks.show", [
             "blank" => \App\Models\Blank::find($blank),
     ]);


    }
     public function del_start_from_blank($blank_id, $start_id){
        $blank = \App\Models\Blank::find($blank_id);
        $blank->startconditions()->detach($start_id);
     }
}

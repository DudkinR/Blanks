<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class FinishController extends Controller
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
        $finishs = \App\Models\Finish::where("author_id", "=", Auth::id())
            ->orwhere(function ($query) use ($my) {
                if ($my == 0) {
                    return $query->where("status", "=", 2);
                }
            })
            ->orderBy("id", "desc")
            // ->orwhere('status','=',2)
            ->get();
        return view("finish.index", compact("finishs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("finish.create");
    }
    public function addfinish($blank)
    {
        return view("finish.create", compact("blank"));
    }
    public function addfinishI(Request $request, $item)
    {
        if (isset($request->uni)) {
            $uni = $request->uni;
            return view("finish.create", compact("item", "uni"));
        } else {
            return view("finish.create", compact("item"));
        }
    }
    public function addfinishsB($blank)
    {
        // if author blank is current user
        $blank = \App\Models\Blank::find($blank);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }

        $finishs = \App\Models\Finish::where("author_id", Auth::id())->get();
        return view("finish.select", compact("finishs", "blank"));
    }
    public function postfinishsB(Request $request)
    {
        $strts = $request->strts;
        $blank = \App\Models\Blank::find($request->blank);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }

        if (isset($request->clean) && $request->clean == 1) {
            $blank->finishconditions()->detach();
        }
        $max_order = $blank->finishconditions->max("pivot.order");
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
        $blank->finishconditions()->attach($add_strts);
        //return $blank->finishconditions;
        return redirect()->route("blanks.show", $blank);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public $badSymbols = ["•", ";"];

    public function AddToBlank($finish, $blank = 0, $item = 0)
    {
        if ($blank !== 0 && ($bl = \App\Models\Blank::find($blank))) {
            if ($bl->author_id !== Auth::id()) {
                return back();
            }
            $max_order = DB::table("blank_finish")
                ->where("blank_id", "=", $bl->id)
                ->max("order");
            if ($max_order == null) {
                $max_order = 0;
            }
            $next = $max_order + 1;
            $insertdata = [["condition_id" => $finish->id, "order" => $next]];
            $bl->finishconditions()->attach($insertdata);
        }
        if ($item !== 0 && ($it = \App\Models\Item::find($item))) {
            if ($it->author_id !== Auth::id()) {
                return redirect()->route("item.show", $item);
            }

            $it->finishconditions()->detach();
            $max_order_item_item = DB::table("item_finish")
                ->where("item_id", "=", $item)
                ->max("order");
            if ($max_order_item_item == null) {
                $max_order_item_item = 0;
            }
            $next = $max_order_item_item + 1;
            $insertdata = [["condition_id" => $finish->id, "order" => $next]];
            $it->finishconditions()->attach($insertdata);
        }
    }
    public function store(Request $request)
    {
        $blank = \App\Models\Blank::find($request->blank);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }
        if (!isset($request->textn)) {
            $finish = $this->FindStart(
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
            $this->AddToBlank($finish, $blank, $item);
        } else {
            $cnts = explode("\n", $request->content);
            foreach ($cnts as $content) {
                $finish = $this->FindStart(
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
                $this->AddToBlank($finish, $blank, $item);
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

        return redirect()->route("finish.index");
    }
    public function FindStart($word, $lang, $status)
    {
        $finish = \App\Models\Finish::where("content", "LIKE", $word)->first();
        if ($finish == null) {
            $finish = new \App\Models\Finish();
            $finish->author_id = Auth::id();
            // language
            if (isset($request->lang)) {
                $finish->lang = $lang;
            } else {
                $finish->lang = Session::get("locale");
            }
            $finish->content = str_replace($this->badSymbols, "", $word);
            $finish->status = $status;
            $finish->save();
        }
        return $finish;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $finish = \App\Models\Finish::find($id);
        return view("finish.show", compact("finish"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $blank = \App\Models\Blank::find($request->blank);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }
        $finish = \App\Models\Finish::find($id);
        // if author finish is current user

        if ($finish->author_id !== Auth::id()) {
            return redirect()->route("finish.index");
        }
        if (isset($request->blank)) {
            $blank = $request->blank;
        } else {
            $blank = 0;
        }
        return view("finish.edit", compact("finish", "blank"));
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
        $finish = \App\Models\Finish::find($id);
        // if author finish is current user
        if ($finish->author_id !== Auth::id()) {
            return redirect()->route("finish.index");
        }
        $finish->content = $request->content;
        $finish->status = $request->status;
        // save session status
        // language
        if (isset($request->lang)) {
            $finish->lang = $request->lang;
        } else {
            $finish->lang = Session::get("locale");
        }
        Session::put("status", $request->status);
        $finish->save();
        if (isset($request->blank) && $request->blank !== 0) {
            return redirect()->route("blanks.show", $request->blank);
        } else {
            return redirect()->route("finish.index");
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
        $finish = \App\Models\Finish::find($id);

        // if author finish is current user
        if ($finish->author_id !== Auth::id()) {
            return redirect()->route("finish.index");
        }
        $finish->delete();
        return redirect()->route("finish.index");
    }
    public function shift_up(Request $request)
    {
        $blank = \App\Models\Blank::find($request->blank);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }
        $blank_id = $request->blank;
        $condition_id = $request->finish;
        $order = $request->order;
        $priv_order = $order - 1;

        if ($priv_order > 0) {
            $current = \App\Models\Blank::find($blank_id)
                ->finishconditions->where("pivot.order", "<=", $order)
                ->where("pivot.condition_id", "=", $condition_id)
                ->where("pivot.blank_id", "=", $blank_id)
                ->first()->pivot->id;

            $priv = \App\Models\Blank::find($blank_id)
                ->finishconditions->where("pivot.order", "<=", $order)
                ->where("pivot.id", "!=", $current)
                ->last()->pivot->id;
            //return [$current,$priv ];

            DB::table("blank_finish")
                ->where("id", "=", $current)
                ->update(["order" => $priv_order]);
            DB::table("blank_finish")
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
        $condition_id = $request->finish;
        $order = $request->order * 1;
        $next_order = $order + 1;
        $max_order = $current = \App\Models\Blank::find(
            $blank_id
        )->finishconditions->max("pivot.order");
        if ($max_order == null) {
            $max_order = 1;
        }

        if ($next_order <= $max_order) {
            $ct = \App\Models\Blank::find($blank_id)->finishconditions->where(
                "pivot.condition_id",
                "=",
                $condition_id
            );
            foreach ($ct as $c) {
                $current = $c->pivot->id;
            }
            $next = \App\Models\Blank::find($blank_id)
                ->finishconditions->where("pivot.order", "=", $next_order)
                ->where("pivot.condition_id", "!=", $condition_id)
                ->first()->pivot->id;
            // return [$current, $next , $order , $next_order];
            DB::table("blank_finish")
                ->where("id", "=", $current)
                ->update(["order" => $next_order]);
            DB::table("blank_finish")
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
        $condition_id = $request->finish;
        $finish = \App\Models\Finish::find($condition_id);
        $pivot_order = $request->order;

        $blank
            ->finishconditions()
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
        foreach ($blank->finishconditions as $o) {
            $o->pivot->order = $od;
            $o->pivot->save();
            $od++;
        }
    }
}

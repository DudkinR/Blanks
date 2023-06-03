<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use DOMDocument;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // return $request;
       $alreadySelectItems=[];
       foreach($request->all() as $key=>$val){
        if(count(explode("asi_",$key))>1&&($val!==''||$val==null))
        $alreadySelectItems[]=$val;
       }
      // return $alreadySelectItems;
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
            ->orderBy("name", "ASC")
            ->get();
        if (isset($request->cat)) {
            $category_id = $request->cat; // the ID of the category you want to find items for
            if ($category_id == 0) {
                $items = Item::whereDoesntHave("blanks.categories")
                ->where(function ($query) use ($wrds){
                    if(count($wrds)>0){
                        $query->where(function ($q) use ($wrds) {
                            foreach ($wrds as $word) {
                                $q->where("content", "like", "%" . $word . "%");
                            }
                        });
                    }
                    else return $query;
                }
                )
                    ->orderBy("name", "ASC")
                    ->get();
            } else {
                $items = \App\Models\Item::whereHas(
                    "blanks.categories",
                    function ($query) use ($category_id) {
                        $query->where("categories.id", $category_id);
                    }
                )
                ->where(function ($query) use ($wrds){
                    if(count($wrds)>0){
                        $query->where(function ($q) use ($wrds) {
                            foreach ($wrds as $word) {
                                $q->where("content", "like", "%" . $word . "%");
                            }
                        });
                    }
                    else return $query;
                }
                )
                    ->orderBy("name", "ASC")
                    ->get();
            }
        } else {
           $items = \App\Models\Item::where("parent_id", "=", 0)
                ->where("author_id", "=", Auth::id())
                ->where(function ($query) use ($wrds){
                    if(count($wrds)>0){
                        $query->where(function ($q) use ($wrds) {
                            foreach ($wrds as $word) {
                                $q->where("content", "like", "%" . $word . "%");
                            }
                        });
                    }
                    else return $query;
                }
                )
                ->orderBy("name", "ASC")
                //->take(25)
                ->get();
        }
       
        return view("item.index", compact("items", "categories","alreadySelectItems"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("item.create");
    }
    public function additem($blank)
    {
        $ready_items = \App\Models\Item::all();
        $blankM = \App\Models\Blank::find($blank);
        $positions = $blankM->positions;
        return view("item.create", compact("blank", "positions"));
    }
    public function addreadyitem($blank_id)
    {
        $blank = \App\Models\Blank::find($blank_id);
        if ($blank->author_id != Auth::id()) {
            return redirect()->route("blanks.index");
        }

        $ready_items = \App\Models\Item::where("author_id", "=", Auth::id())
            ->orderBy("id", "DESC")
            ->get();
        return view("item.addreadyitem", compact("blank", "ready_items"));
    }
    public function addreadyitemI($item)
    {
        // almost similar
        $ready_items = \App\Models\Item::where("author_id", "=", Auth::id())
            ->orderBy("id", "DESC")
            ->get();
        return view("item.addreadyitemI", compact("item", "ready_items"));
    }
    public function addreadyitems(Request $request)
    {
        $blank = \App\Models\Blank::find($request->blank_id);
        if ($blank->author_id != Auth::id()) {
            return redirect()->route("blanks.index");
        }
        $max_order = $blank->items()->max("order") + 1;
        if (isset($request->items) && count($request->items) > 0) {
            foreach ($request->items as $olditem) {
                $item = \App\Models\Item::find($olditem);
                $blank->items()->attach($item->id, ["order" => $max_order]);
                $max_order++;
            }
        }
        $api_token = Auth::user()->api_token;
        if ($blank->author_id == Auth::id()) {
            return redirect()->route(
                "blanks.show",
                compact("blank", "api_token")
            );
        } else {
            return redirect()->route("blanks.show_guest", compact("blank"));
        }
    }
    public function additemAjax(Request $request)
    {
        $blank = \App\Models\Blank::find($request->blank_id); //->items;
        $maxorder = $blank->items()->max("order") + 1;
        $add_items_data = [];
        foreach ($request->items as $item) {
            $add_items_data[$item] = ["order" => $maxorder];
            $maxorder++;
        }
        $blank->items()->attach($add_items_data);
    }
    public function addreadyitemsI(Request $request)
    {
        $item = \App\Models\Item::find($request->item_id); //->items;
        $maxorder = $item->items()->max("order") + 1;
        $add_items_data = [];
        foreach ($request->items as $item) {
            $add_items_data[$item] = ["order" => $maxorder];
            $maxorder++;
        }
        $item->items()->attach($add_items_data);
        $max_order_item_item = DB::table("item_item")
            ->where("parent_id", "=", $request->item)
            ->max("order");
        $next = $max_order_item_item + 1;
        return redirect()->route("item.edit", $request->item_id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSeparate(Request $request){
       return $lines = $this->textToLines($request->content);
  
    }
public function textToLines($text){
    $dom = new DOMDocument();
    $dom->loadHTML($text);
    $lis = $dom->getElementsByTagName('li');
    $linesArray = [];
    foreach($lis as $li){
        $decodedValue = mb_convert_encoding($li->nodeValue, "UTF-8", "auto");
        $decodedValue = iconv("UTF-8", "UTF-8//IGNORE", $decodedValue);
        $linesArray[] = $decodedValue;
    }

    return $linesArray;
}





    public function store(Request $request)
    {
       
        if(isset($request->separate)&&$request->separate==1){
          return  $this->storeSeparate($request);
        }
        $olditem = \App\Models\Item::where("name", "=", $request->name)
            ->where("name", "=", $request->name)
            ->where("content", "=", $request->content)
            ->where("parent_id", "=", $request->parent_id)
            ->where("status", "=", $request->status)
            ->get();
        if ($olditem->count() == 0) {
            $item = new \App\Models\Item();
            $item->author_id = Auth::id();
            $item->name = $request->name;

            $item->status = $request->status;
            Session::put("status", $request->status);
            $item->content = $request->content;
            $item->parent_id = $request->parent_id;
            $item->real_time = 0;
            $item->avoid_time = 0;
            $item->save();
        } else {
            $item = $olditem->first();
        }
        $item->positions()->detach();
        $item->control_positions()->detach();
        $item->positions()->attach($request->positions);
        $item->control_positions()->attach($request->controls);

        Session::put("positions", $request->positions);
        Session::put("controls", $request->controls);
        if ($request->parent_id > 0) {
            $parent_item = Item::find($request->parent_id);
            $parent_item->items()->attach($item->id);

            if (isset($request->blank)) {
                $blank = \App\Models\Blank::find($request->blank);
                $max_order = $blank->items()->max("order");
                $blank->items()->attach($item->id, ["order" => $max_order + 1]);
                $positions = $blank->positions;
                $api_token = Auth::user()->api_token;
                if ($blank->author_id == Auth::id()) {
                    return view("blanks.show", compact("blank", "api_token"));
                } else {
                    return view("blanks.show_guest", compact("blank"));
                }
            } elseif (isset($request->item)) {
                $item = \App\Models\Item::find($request->item);
                $max_order = $item->items()->max("order");
                $item->items()->attach($item->id, ["order" => $max_order + 1]);
                $itm = $item;
                $positions = $itm->positions;
                return view("item.undershow", [
                    "positions" => $positions,
                    "item" => $itm,
                ]);
            } else {
                $blank = 0;
                $positions = [];
            }
            return view("item.edit", [
                "item" => $parent_item,
                "positions" => $positions,
                "blank" => $blank,
            ]);
        } else {
            if (isset($request->blank)) {
                $blank = \App\Models\Blank::find($request->blank);
                $max_order = $blank->items()->max("order");
                $blank->items()->attach($item->id, ["order" => $max_order + 1]);
                $positions = $blank->positions;
                $api_token = Auth::user()->api_token;
                if ($blank->author_id == Auth::id()) {
                    return back()
                        ->withInput([
                            "blank" => $request->blank,
                            "api_token" => $api_token,
                        ])
                        ->with("bl", $request->blank);
                       // ->fragment("item_" . $item->id);
                    return view("blanks.show", compact("blank", "api_token"));
                } else {
                    return view("blanks.show_guest", compact("blank"));
                }
            }
        }
        return redirect()->route("item.index");
    }

    public function set_order_blank($item, $num)
    {
    }
    //  order  shift up
    public function shift_up(Request $request)
    {
        $blank_id = $request->blank;
        $item_id = $request->item;
        $current = DB::table("blank_item")
            ->where("blank_id", "=", $blank_id)
            ->where("item_id", "=", $item_id)
            ->get();
        $order1 = $current[0]->order;
        $id1 = $current[0]->id;
        if (
            $privid = DB::table("blank_item")
                ->where("blank_id", "=", $blank_id)
                ->where("order", "<", $current[0]->order)
                ->orderBy("order", "DESC")
                ->first()
        ) {
            $order2 = $privid->order;
            $id2 = $privid->id;
            // return [$id1,$order1,$id2,$order2];
            if ($order2 > 0) {
                DB::table("blank_item")
                    ->where("blank_id", "=", $blank_id)
                    ->where("id", "=", $id1)
                    ->update(["order" => $order2]);
                DB::table("blank_item")
                    ->where("blank_id", "=", $blank_id)
                    ->where("id", "=", $id2)
                    ->update(["order" => $order1]);
                $this->cleanStat($blank_id);
            }
        }
        $blank = \App\Models\Blank::find($blank_id);
        $api_token = Auth::user()->api_token;
        if ($blank->author_id == Auth::id()) {
            return back()
                ->withInput([
                    "blank" => $request->blank,
                    "api_token" => $api_token,
                ])
                ->with("bl", $request->blank);
               // ->fragment("item_" . $item->id);
            return view("blanks.show", compact("blank", "api_token"));
        } else {
            return view("blanks.show_guest", compact("blank"));
        }
    }
    //  order  shift down
    public function shift_down(Request $request)
    {
        $blank_id = $request->blank;
        $item_id = $request->item;
        $current = DB::table("blank_item")
            ->where("blank_id", "=", $blank_id)
            ->where("item_id", "=", $item_id)
            ->get("order");
        if (
            $nextid = DB::table("blank_item")
                ->where("blank_id", "=", $blank_id)
                ->where("order", ">", $current[0]->order)
                ->orderBy("order", "asc")
                ->first()
        ) {
            DB::table("blank_item")
                ->where("blank_id", "=", $blank_id)
                ->where("item_id", "=", $item_id)
                ->orwhere("item_id", "=", $nextid->item_id)
                ->orderBy("order", "asc")
                ->chunk(2, function ($items) use ($item_id, $blank_id) {
                    $i = 0;
                    foreach ($items as $item) {
                        if ($i == 0) {
                            $order1 = $item->order;
                            $id1 = $item->item_id;
                        }
                        if ($i == 1) {
                            $order2 = $item->order;
                            $id2 = $item->item_id;
                        }
                        $i++;
                    }
                    if ($id1 == $item_id) {
                        DB::table("blank_item")
                            ->where("blank_id", "=", $blank_id)
                            ->where("item_id", "=", $id1)
                            ->update(["order" => $order2]);
                        DB::table("blank_item")
                            ->where("blank_id", "=", $blank_id)
                            ->where("item_id", "=", $id2)
                            ->update(["order" => $order1]);
                    }
                });
            $this->cleanStat($blank_id);
        }
        $blank = \App\Models\Blank::find($blank_id);
        $api_token = Auth::user()->api_token;
        if ($blank->author_id == Auth::id()) {
            return back()
                ->withInput([
                    "blank" => $request->blank,
                    "api_token" => $api_token,
                ])
                ->with("bl", $request->blank);
               // ->fragment("item_" . $item->id);
            return view("blanks.show", compact("blank", "api_token"));
        } else {
            return view("blanks.show_guest", compact("blank"));
        }
    }
    // order insert item after order = $num
    public function insert_after(Request $request)
    {
        $blank_id = $request->blank;
        $item_id = $request->item;
        $num = $request->num;
        DB::table("blank_item")
            ->where("blank_id", "=", $blank_id)
            ->where("order", ">=", $num)
            ->increment("order");
        DB::table("blank_item")
            ->where("blank_id", "=", $blank_id)
            ->where("item_id", "=", $item_id)
            ->update(["order" => $num]);
        $api_token = Auth::user()->api_token;
        return redirect()->route("blanks.show", [
            "blank" => $request->blank,
            "api_token" => $api_token,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $item = \App\Models\Item::find($id);

        return view("item.show", compact("item"));
    }
    public function showUnderblank($id)
    {
        $item = \App\Models\Item::find($id);

        return view("item.undershow", compact("item"));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $item = \App\Models\Item::find($id);
        if ($item->author_id !== Auth::id()) {
            return back();
        }
        if (isset($request->blank)) {
            $blank = \App\Models\Blank::find($request->blank);
            $positions = $blank->positions;
            //    $controls=$blank->control_positions;
            $blank = $request->blank;
        } else {
            $positions = $item->positions;
            //    $controls=$item->control_positions;
            $blank = 0;
        }
        $blanks = $item->blanks;
        // return $blanks;
        return view(
            "item.edit",
            compact("item", "positions", "blank", "blanks")
        );
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
        $this->validate($request, []);
        $item = \App\Models\Item::find($id);
        if ($item->author_id !== Auth::id()) {
            return back();
        }
        if (isset($request->blank_all) && $request->blank_all == 1) {
            $item->name = $request->name;
            $item->status = $request->status;
            $item->content = $request->content;
            $item->parent_id = $request->parent_id;
            $item->save();
            $item->positions()->detach();
            $item->control_positions()->detach();
            $item->positions()->sync($request->positions);
            $item->control_positions()->sync($request->controls);
        } else {
            // если есть массив бланков
            $bad_blanks = [];
            foreach ($request->all() as $key => $val) {
                if (count(explode("blk_", $key)) > 1) {
                    $bad_blanks[] = $val;
                }
            }
            // return $bad_blanks;
            foreach ($bad_blanks as $bbl) {
                //  $order = $item->blanks()->order;
                $item->blanks()->detach($bbl);
                $this->cleanStat($bbl);

                $nitem = new \App\Models\Item();
                $nitem->author_id = Auth::id();
                $nitem->name = $request->name;
                $nitem->status = $request->status;
                $nitem->content = $request->content;
                $nitem->parent_id = $request->parent_id;
                $nitem->real_time = 0;
                $nitem->avoid_time = 0;
                $nitem->save();
                $nitem->positions()->detach();
                $nitem->control_positions()->detach();
                $nitem->positions()->sync($request->positions);
                $nitem->control_positions()->sync($request->controls);
                $nitem->blanks()->sync($bbl);
                $this->newOrderBlank(\App\Models\Blank::find($bbl));
            }
        }
        Session::put("status", $request->status);
        Session::put("positions", $request->positions);
        Session::put("controls", $request->controls);
        // если есть бланк на который надо перейти
        $api_token = Auth::user()->api_token;
        if (isset($request->blank)) {
            return back()
                ->withInput([
                    "blank" => $request->blank,
                    "api_token" => $api_token,
                ])
                ->with("bl", $request->blank);
               // ->fragment("item_" . $item->id);
            /*     return redirect()->route("blanks.show", [
                "blank" => $request->blank,
                "api_token" => $api_token,
            ]); */
        }
        return redirect()->route("item.index");
    }
    public function cleanStat($id)
    {
        $statBlanks = \App\Models\StatBlank::where("blank_id", $id)->get();
        foreach ($statBlanks as $statBlank) {
            $statBlank->finish = 0;
            $statBlank->save();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (isset($request->_token) && session("_token") == $request->_token) {
            if (isset($request->item)) {
                $id = $request->item;
            }
            $item = \App\Models\Item::find($id);
            if ($item->author_id !== Auth::id()) {
                return back();
            }

            if (isset($request->blank) && $item->blanks->count() >= 1) {
                $pivot_order = $request->order;
                $item
                    ->blanks()
                    ->wherePivot("order", $pivot_order)
                    ->detach($request->blank);
                $this->newOrderBlank(\App\Models\Blank::find($request->blank));
            }
            $item->delete();
            return redirect()->route("item.index");
        }
    }
    public function del(Request $request, $id)
    {
        if (isset($request->_token) && session("_token") == $request->_token) {
            if (isset($request->item)) {
                $id = $request->item;
            }
            $item = \App\Models\Item::find($id);
            if ($item->author_id !== Auth::id()) {
                return redirect()->route("item.index", [
                    "message" => "У вас нет прав на удаление этого элемента",
                ]);
            }
            if (isset($request->blank)) {
                $pivot_order = $request->order;
                $item
                    ->blanks()
                    ->wherePivot("order", $pivot_order)
                    ->detach($request->blank);
                $this->cleanStat($request->blank);
                $this->newOrderBlank(\App\Models\Blank::find($request->blank));
                $api_token = Auth::user()->api_token;
                return back()
                    ->withInput([
                        "blank" => $request->blank,
                        "api_token" => $api_token,
                    ])
                    ->with("bl", $request->blank);
                   // ->fragment("item_" . $item->id);
            }
        }
    }
    public function copy(Request $request)
    {
        // "blank" "item" "order"

        $item = \App\Models\Item::find($request->item);
        if ($item->author_id !== Auth::id()) {
            return back();
        }
        $blank = \App\Models\Blank::find($request->blank);
        $order_item = $blank
            ->items()
            ->where("item_id", $request->item)
            ->first()->pivot->order;
        $new_data_pivot = [$item->id, ["order" => $max_order + 1]];
        $blank->items()->attach($new_data_pivot);
        $this->newOrderBlank($blank);
        $this->cleanStat($request->blank);
        $api_token = Auth::user()->api_token;
        return back()
            ->withInput([
                "blank" => $request->blank,
                "api_token" => $api_token,
            ])
            ->with("bl", $request->blank);
           // ->fragment("item_" . $item->id);
    }
    public function newOrderBlank($blank)
    {
        $od = 1;
        foreach ($blank->items as $o) {
            $o->pivot->order = $od;
            $o->pivot->save();
            $od++;
        }
    }
}

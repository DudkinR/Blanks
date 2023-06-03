<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if (isset($request->searchwords)) {
            $wrds = explode(" ", trim(e($request->searchwords)));
            Session::put('searchW',trim(e($request->searchwords)));
        } else {
            if(session('searchW')!==null)
                $wrds = explode(" ", session('searchW'));
            else
                $wrds = [];
        }
        $positions = \App\Models\Position::where("author_id", "=", Auth::id())
            ->orderBy("id", "desc")
            ->get();
        return view("position.index", compact("positions"));
    }
    public function indexfree()
    {
        //
        $positions = \App\Models\Position::where("status", "=", 2)->get();
        return view("position.index", compact("positions"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("position.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "abv" => "required",
            "status" => "required",
            "description" => "required",
        ]);
        $position = new \App\Models\Position();
        // author id from session
        $position->author_id = Auth::id();
        $position->name = $request->name;
        $position->status = $request->status;
        $position->abv = $request->abv;
        $position->description = $request->description;
        //если язык не выбран, то по умолчанию локате
        if ($request->lang) {
            $position->lang = $request->lang;
        } else {
            $position->lang = Session::get("locale");
        }
        $position->save();
        return redirect()->route("position.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = \App\Models\Position::find($id);
        return view("position.show", compact("position"));
    }
    public function addblankshow($blank)
    {
        $blk=\App\Models\Blank::find( $blank);
        if ($blk->author_id !== Auth::id()) {
            return back();
        }
        $positions = \App\Models\Position::where(
            "author_id",
            "=",
            Auth::id()
        )->get();
        $mypositions = [];
        foreach (\App\Models\Blank::find($blank)->positions as $position) {
            $mypositions[] = $position->id;
        }
        return view(
            "position.addblank",
            compact("blank", "positions", "mypositions")
        );
    }
    public function addblankposition(Request $request)
    {
        $blank=\App\Models\Blank::find( $request->blank);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }
        $itemM = \App\Models\Blank::find($request->blank);
        // author curent user
        if ($itemM->author_id != Auth::id()) {
            return redirect()->route("blanks.index");
        }

        $itemM->positions()->detach();

        $itemM->positions()->attach($request->positions);
        return redirect()->route("blanks.show", $request->blank);
    }
    public function additemshow(Request $request, $item)
    {
        $blank=\App\Models\Blank::find( $request->blank);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }
        $positions = \App\Models\Position::where(
            "author_id",
            "=",
            Auth::id()
        )->get();
        if (isset($request->blank)) {
            $blank = $request->blank;
            return view(
                "position.additem",
                compact("item", "positions", "blank")
            );
        } elseif (isset($request->uni)) {
            $uni = $request->uni;
            return view(
                "position.additem",
                compact("item", "positions", "uni")
            );
        } else {
            return view("position.additem", compact("item", "positions"));
        }
    }
    public function additemposition(Request $request)
    {

        // return $request;
        $itemM = \App\Models\Item::find($request->item);
        // author curent user
        if ($itemM->author_id != Auth::id()) {
            return back();
        }

        $itemM->positions()->detach();
        $itemM->positions()->attach($request->positions);

        if (isset($request->blank)) {
            return redirect()->route("blanks.show", $request->blank);
        } elseif (isset($request->uni)) {
            return redirect()->route("underblank.show", $request->uni);
        } else {
            //return view('item.edit', compact('item','positions','blank'));
            return redirect()->route("item.edit", [
                "positions" => $itemM->positions(),
                "item" => $request->item,
            ]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = \App\Models\Position::find($id);
        // curent user
        if ($position->author_id != Auth::id()) {
            return redirect()->route("position.index");
        }

        return view("position.edit", compact("position"));
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
        $position = \App\Models\Position::find($id);
        // curent user
        if ($position->author_id != Auth::id()) {
            return back();
        }

        $position->name = $request->name;
        $position->abv = $request->abv;
        $position->status = $request->status;
        // Session::Put();
        $position->description = $request->description;
        $position->save();
        return redirect()->route("position.index", [
            "last_status" => $request->status,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = \App\Models\Position::find($id);
        // curent user
        if ($position->author_id != Auth::id()) {
            return back();
        }
        $position->delete();
        return redirect()->route("position.index");
    }
}

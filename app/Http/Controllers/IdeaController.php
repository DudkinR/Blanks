<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // filtr request status autor category if exist
        $ideas = [];
        $ideas1 = [];
        $ideas2 = [];
        $ideas3 = [];
        if ($request->has("status")) {
            $ideas1 = \App\Models\Idea::where("status", $request->status)
                ->orderby("created_at", "asc")
                ->get();
        }
        if ($request->has("author")) {
            $ideas2 = \App\Models\Idea::where("author_id", $request->author)
                ->orderby("created_at", "asc")
                ->get();
        }
        if ($request->has("category")) {
            $ideas3 = \App\Models\Idea::where("category", $request->category)
                ->orderby("created_at", "asc")
                ->get();
        }
        // merge ideas
        $ideas = array_merge($ideas1, $ideas2, $ideas3);
        // count ideas if 0 return all ideas
        if (count($ideas) === 0) {
            $ideas = \App\Models\Idea::where("status", 0)->orderby("created_at", "desc")->get();
        }

        return view("ideas.index", compact("ideas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ideas.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public $badSymbols = ["•", ";"];
    public function store(Request $request)
    {
        $request->validate([
            "content" => "required",
            "category" => "required",
        ]);
        $idea = new \App\Models\Idea();
        $idea->content = $request->content;
        $idea->author_id = Auth::id();
        $idea->status = 0;
        $idea->category = $request->category;
        $idea->save();
        return redirect()->route("idea.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idea = \App\Models\Idea::find($id);
        return view("ideas.show", compact("idea"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idea = \App\Models\Idea::find($id);
        // if author idea is current user

        if ($idea->author_id !== Auth::id()) {
            return redirect()->route("ideas.index");
        }
        return view("ideas.edit", compact("idea"));
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
        $request->validate([
            "content" => "required",
            "category" => "required",
            "status" => "required",
        ]);
        $idea = \App\Models\Idea::find($id);
        $idea->content = $request->content;
        $idea->category = $request->category;
        $idea->status = $request->status;
        //on_update
        $idea->updated_at = now();
        $idea->save();

        return redirect()->route("idea.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idea = \App\Models\Idea::find($id);
        $idea->delete();
       // return redirect()->route("idea.index"); 
        return back()
        ->with("idea", $id);
       // ->fragment("idea_" . $id);
    }
    public function dell(Request $request)
    {
    }
}

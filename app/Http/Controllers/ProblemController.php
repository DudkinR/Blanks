<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class ProblemController extends Controller
{
    public function index()
    {
        $problems = \App\Models\Problem::all();
        return view("problem.index", compact("problems"));
    }

    public function create()
    {
        return view("problem.create");
    }
    public function store(Request $request)
    {
        $problem = new \App\Models\Problem();
        // author id from session
        $problem->author_id = Auth::id();
        $problem->desition = $request->desition;
        $problem->content = $request->content;
        $problem->status = $request->status;
        $problem->save();
        if (isset($request->blank)) {
            $problem->blanks()->attach([$request->blank]);
            if (isset($request->item_id)) {
                $problem->items()->attach($request->item_id);

                $work_now = session("work_now");
                $item_next = $work_now["item_next"];
                $item = $work_now["item"];
                $item_priv = $work_now["item_priv"];
                $item_priv_id = $work_now["item_priv_id"];
                $order = $work_now["order"];
                $blank = $work_now["blank"];
                $project = $work_now["project"];

                $items_count = $blank->items()->count();
                $progress = [
                    "items_count" => $items_count,
                    "order" => $order,
                    "pr" => ceil($order / ($items_count / 100)),
                ];
                $progressPR = \App\Http\Controllers\ProjectController::progress(
                    $project
                );
                $timerStart = Session::get("timerStart");
                return view(
                    "blanks.work",
                    compact(
                        "blank",
                        "item",
                        "item_priv",
                        "item_next",
                        "order",
                        "timerStart",
                        "progress",
                        "progressPR"
                    )
                );
            }
        }

        return redirect()->route("problem.index");
    }
    public function show(Request $request, $id)
    {
        $problem = \App\Models\Problem::find($id);

        return view("problem.show", compact("problem"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $problem = \App\Models\Problem::find($id);
        // author id curent user
        if ($problem->author_id !== Auth::id()) {
            return redirect()->route("problem.index");
        }
        return view("problem.edit", compact("problem"));
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
        $problem = \App\Models\Problem::find($id);
        // author id curent user
        if ($problem->author_id !== Auth::id()) {
            return redirect()->route("problem.index");
        }
        $problem->desition = $request->desition;
        $problem->content = $request->content;
        $problem->status = $request->status;
        $problem->save();
        if (isset($request->blank)) {
            return redirect()->route("blanks.show", $request->blank);
        }
        return redirect()->route("problem.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $problem = \App\Models\Problem::find($id);
        // author id curent user
        if ($problem->author_id !== Auth::id()) {
            return redirect()->route("problem.index");
        }
        $problem->delete();
        return redirect()->route("problem.index");
    }
}

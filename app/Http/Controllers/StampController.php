<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\ProjectBlankOrderStamp;
class StampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stamps = \App\Models\Stamp::where("author_id", "=", Auth::id())->get();
        // return $stamps->get();
        return view("stamp.index", ["stamps" => $stamps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("stamp.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        if (session("locale") !== null) {
            $lang = session("locale");
        } else {
            $lang = "en";
        }
        $stamp = $this->findContent($request->content, $user_id, $lang);
        return redirect("/stamp/" . $stamp->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stamp = \App\Models\Stamp::find($id);
        return view("stamp.show", compact("stamp"));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stamp = \App\Models\Stamp::find($id);
        return view("stamp.edit", compact("stamp"));
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
        $stamp = \App\Models\Stamp::find($id);
        $stamp->content = e($request->content);
        if (session("locale") !== null) {
            $stamp->lang = session("locale");
        } else {
            $stamp->lang = "en";
        }
        $stamp->save();
        return redirect()->route("stamp.show", compact("stamp"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stamp = \App\Models\Stamp::find($id);
        $stamp->delete();
        return redirect()->route("stamp.index");
    }
    public function addstamps(Request $request)
    {
        $blank = \App\Models\Blank::find($request->blank_id);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }

        $stamps = [];
        foreach ($blank->stamps as $stmp) {
            $stamps[] = $stmp->content;
        }
        $words = [];
        $words = $this->addWordMass($blank->name, $words);
        $words = $this->addWordMass($blank->tcheme, $words);
        foreach ($blank->items as $item) {
            $words = $this->addWordMass($item->content, $words);
            $words = $this->addWordMass($item->name, $words);
        }
        foreach ($blank->startconditions as $item) {
            $words = $this->addWordMass($item->content, $words);
        }
        foreach ($blank->finishconditions as $item) {
            $words = $this->addWordMass($item->content, $words);
        }
        return view("stamp.addblank", compact("blank", "words", "stamps"));
    }
    public function findContent($content, $user_id = 0, $lang = "en")
    {
        if ($user_id == 0) {
            return null;
        }
        $content = e($content);
        $data = \App\Models\Stamp::where("content", "=", $content)
            ->where("author_id", "=", $user_id)
            ->get();
        $availableData= [];
            foreach($data as $stmp) {
                if ($stmp->content == $content) {
                    $availableData[] = $stmp;
                }
            }
       if (count($availableData) == 0) {
    // код
            $stamp = new \App\Models\Stamp();
            $stamp->content = $content;
            $stamp->author_id = $user_id; //Auth::id()
            $stamp->lang = $lang;
            $stamp->save();
        } else {
            $stamp = $availableData[0];
        }
        return $stamp;
    }
    public function storeBlankStamps(Request $request)
    {
        $blank = \App\Models\Blank::find($request->blank_id);
        if ($blank->author_id !== Auth::id()) {
            return back();
        }
        $blank->stamps()->detach();

        if (isset($request->stamps)) {
            $stamps = $request->stamps;
            foreach ($stamps as $content) {
                $user_id = Auth::id();
                if (session("locale") !== null) {
                    $lang = session("locale");
                } else {
                    $lang = "en";
                }
                $stamp = $this->findContent($content, $user_id, $lang);
                $blank->stamps()->attach($stamp->id);
            }
        }
        return redirect()->route("blanks.show", compact("blank"));
    }
    public $symbols = [
        "=",
        '"',
        "\"",
        "&lt;",
        "p&gt;",
        ";",
        ":",
        "&",
        "!",
        "@",
        "#",
        '$',
        "%",
        "^",
        "*",
        "(",
        ")",
        "?",
        "<",
        ">",
        "~",
        "=",
        "`",
        "  ",
        "   ",
        "   ",
        "-",
        "\\",
        "\/",
        "/",
    ];
    public function addWordMass($text, $mass = [])
    {
        $text = str_replace($this->symbols, " ", e($text));
        $text = str_replace("  ", " ", e($text));
        $text = str_replace("  ", " ", e($text));
        $words = explode(" ", $text);
        foreach ($words as $w) {
            $w = trim($w);
            if ($w !== "") {
                if (!in_array($w, $mass)) {
                    $mass[] = $w;
                }
            }
        }
        // return $words;
        return $mass;
    }
    public function add_stamp_project_blank(Request $request)
    {
        $project = \App\Models\Project::find($request->project_id);
        if ($project->author_id !== Auth::id()) {
            return back();
        }
        $project_id = $request->project_id;
        $blank_id = $request->blank_id;
        $order = $request->order;
        $PBOS = new ProjectBlankOrderStamp();
        $stmps = $PBOS->stamps($project_id, $blank_id, $order);
        $stamps = $stmps["stamps"];
        $stampsN = $stmps["stampsN"];
        return view(
            "stamp.addstampprojectblank",
            compact("project_id", "blank_id", "order", "stamps", "stampsN")
        );
    }
    public function addprojectblankstamp_R(Request $request)
    {
        $project = \App\Models\Project::find($request->project_id);
        if ($project->author_id !== Auth::id()) {
            return back();
        }
        $project_id = $request->project_id;
        $blank_id = $request->blank_id;
        $order = $request->order;
        foreach ($request->all() as $key => $value) {
            if (strpos($key, "stamp_") === 0) {
                $k = explode("_", $key);
                $val2 = $request->input("newstamp_" . $k[1]);
                $stamp = \App\Models\Stamp::where(
                    "content",
                    "=",
                    e($value)
                )->first();
                if ($stamp !== null) {
                    if (
                        trim(e($val2)) !== "" &&
                        trim(e($val2)) !== trim(e($value))
                    ) {
                        $nstamp = \App\Models\Stamp::where(
                            "content",
                            "=",
                            e($val2)
                        )
                            ->where("author_id", "=", Auth::id())
                            ->first();
                        if ($nstamp == null) {
                            $nstamp = new \App\Models\Stamp();
                            $nstamp->content = e($val2);
                            $nstamp->author_id = Auth::id();
                            if (session("locale") !== null) {
                                $nstamp->lang = session("locale");
                            } else {
                                $nstamp->lang = "en";
                            }
                            $nstamp->save();
                        }
                        $project_stamp = ProjectBlankOrderStamp::where(
                            "project_id",
                            "=",
                            $project_id
                        )
                            ->where("blank_id", "=", $blank_id)
                            ->where("order", "=", $order)
                            ->where("stamp_id", "=", $stamp->id)
                            ->first();
                        if ($project_stamp == null) {
                            $project_stamp = new ProjectBlankOrderStamp();
                            $project_stamp->project_id = $project_id;
                            $project_stamp->blank_id = $blank_id;
                            $project_stamp->order = $order;
                            $project_stamp->stamp_id = $stamp->id;
                        }
                        $project_stamp->new_stamp_id = $nstamp->id;
                        $project_stamp->save();
                    } else {
                        ProjectBlankOrderStamp::where(
                            "project_id",
                            "=",
                            $project_id
                        )
                            ->where("blank_id", "=", $blank_id)
                            ->where("order", "=", $order)
                            ->where("stamp_id", "=", $stamp->id)
                            ->delete();
                    }
                }
            }
        }
        $project = \App\Models\Project::find($project_id);
        return redirect()->route("project.show", compact("project"));
    }
    public static function stamps($project_id, $blank_id, $order)
    {
        $stamps = [];
        $stampsN = [];

        $sts = \App\Models\ProjectBlankOrderStamp::where(
            "project_id",
            $project_id
        )
            ->where("blank_id", $blank_id)
            ->where("order", $order)
            ->get();
        foreach ($sts as $st) {
            $stamps[] = \App\Models\Stamp::find($st->stamp_id)->content;
            $stampsN[] = \App\Models\Stamp::find($st->new_stamp_id)->content;
        }
        if (\App\Models\Blank::find($blank_id)) {
            //   return \App\Models\Blank::find($blank_id);
            $stampIdeal = \App\Models\Blank::find($blank_id)
                ->stamps()
                ->pluck("content")
                ->toArray();
            foreach ($stampIdeal as $st) {
                if (!in_array($st, $stamps)) {
                    $stamps[] = $st;
                    $stampsN[] = $st;
                }
            }
        } else {
            $stampsN = $stamps;
        }
        return ["stamps" => $stamps, "stampsN" => $stampsN];
    }
    public function api_addstamp(Request $request)
    {
        $token = $request->header("Authorization");
        $token = str_replace("Bearer ", "", $token);
        $api_token = $request->api_token;
        $user = \App\Models\User::where("api_token", $api_token)->first();
        $blank = \App\Models\Blank::find($request->blank);
        if ($blank->author_id !== $user->id) {
            return back();
        }
        //  return session('current_user');
        $user_id = $user->id;
        if (session("locale") !== null) {
            $lang = session("locale");
        } else {
            $lang = "en";
        }
        // convert from url
        $selectedText = urldecode($request->selectedText);
      //  return      $selectedText         ;
        $stamp = $this->findContent($selectedText, $user_id, $lang);
        $blank->stamps()->detach($stamp->id);
        $blank->stamps()->attach($stamp->id);
        return $blank->stamps;
    }
    public function clear_all_stamps($blank_id)
    {
        $blank = \App\Models\Blank::find($blank_id);
        $blank->stamps()->detach();
        return $blank->stamps;
    }
}

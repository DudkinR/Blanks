<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //index
    public function index(Request $request)
    {
        // profile information
        $user = auth()->user();
        if (
            isset($request->project) &&
            ($pr =
                \App\Models\Project::find($request->project) &&
                \App\Models\Project::find($request->project)->author_id ==
                    Auth::id())
        ) {
            Session::put("project", $request->project);
        }
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
        Session::put("project", $project->id);
        $projects = \App\Models\Project::where(
            "author_id",
            "=",
            Auth::id()
        )->get();
        // return $project->blanks;
        return view("profile.index", compact("user", "project", "projects"));
    }
    public function edit($id)
    {
        $user = \App\Models\User::find($id);
        $profile = $user->profile;
        return view("profile.edit", compact("user", "profile"));
    }
    // update
    public function update(Request $request, $id)
    {
        // profile information
        $user = auth()->user();
        // validation
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            // other validation rules
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }
        // update

        $user->update([
            "name" => $request->name,
        ]);
        // image
        // if user->profile is null, create a new profile
        if ($user->profile == null) {
            $user->profile()->create([
                "user_id" => $user->id,
                "money" => 0,
                "image" => "",
                "size" => 1,
                "color" => "#000000",
                "background" => "#ffffff",
                "lpanel" => 1,
                "rpanel" => 1,
                "tpanel" => 1,
                "bpanel" => 1,
            ]);
        }
        $user->profile->size = $request->size;
        $user->profile->color = $request->color;
        $user->profile->sex = $request->sex;
        $user->profile->lang = $request->lang;
        $user->profile->help = $request->help;
        $user->profile->background = $request->background;
        $user->profile->save();
        if ($request->hasFile("profile_image")) {
            $image = $request->file("profile_image");

            // Check if the uploaded file is an SVG
            if ($image->getClientOriginalExtension() == "svg") {
                // Store the uploaded SVG file to the storage directory
                $name =
                    time() .
                    "_" .
                    uniqid() .
                    "." .
                    $image->getClientOriginalExtension();
                $path = $image->storeAs("public/profiles", $name);

                $previousImage = $user->profile->image;
                $newImage = "storage/profiles/" . $name;

                // Set the user's profile image to the path of the uploaded SVG file
                $user->profile->image = $newImage;
                $user->profile->save();

                // Delete the previous image
                if (!empty($previousImage)) {
                    Storage::delete($previousImage);
                }
            } else {
                // Create an instance of Intervention Image from the uploaded file
                $img = Image::make($image);

                // Resize the image if its size is greater than 640x640
                if ($img->width() > 640 || $img->height() > 640) {
                    $img->fit(640, 640);
                }

                // Generate a unique filename for the resized image
                $name =
                    time() .
                    "_" .
                    uniqid() .
                    "." .
                    $image->getClientOriginalExtension();

                // Save the resized image to the storage directory
                $path = $img->save(
                    storage_path("app/public/profiles/" . $name)
                );

                $previousImage = $user->profile->image;
                $newImage = "storage/profiles/" . $name;

                // Set the user's profile image to the path of the resized image
                $user->profile->image = $newImage;
                $user->profile->save();

                // Delete the previous image
                if (!empty($previousImage)) {
                    Storage::delete($previousImage);
                }
            }
        }

        // redirect
        return redirect()->route("profile.index");
    }
    //show
    public function show($id)
    {
        // profile information
        $user = auth()->user();
        if ($user->profile == null) {
            $user->profile()->create([
                "user_id" => $user->id,
                "money" => 0,
                "image" => "",
                "size" => 1,
                "color" => "#000000",
                "background" => "#ffffff",
            ]);
        }
        return view("profile.index", compact("user"));
    }
    public function settingindex()
    {
        $user = auth()->user();
        return view("profile.index", compact("user"));
    }
    public function profilepanel(Request $request)
    {
        // `lpanel`, `rpanel`, `bpanel`, `tpanel`
        $user = \App\Models\User::find(Auth::id());
        if ($request->t == 1) {
            $t = 1;
        } else {
            $t = 0;
        }
        if ($request->panel == "LPanel") {
            $user->profile->lpanel = $t;
        } elseif ($request->panel == "RPanel") {
            $user->profile->rpanel = $t;
        } elseif ($request->panel == "TPanel") {
            $user->profile->tpanel = $t;
        } elseif ($request->panel == "BPanel") {
            $user->profile->bpanel = $t;
        }
        $user->profile->save();
        return $user->profile;
    }
    public function formwork(Request $request)
    {
        Session::put("work_categories", $request->categories);
        //    return session("work_categories");
        Session::put("work_positions", $request->positions);
        $categories = \App\Models\Category::where("author_id", "=", Auth::id())
            // and other or where "author_id","!=",Auth::id()) and status=2
            ->orwhere(function ($query) {
                $query
                    ->where("author_id", "!=", Auth::id())
                    ->where("status", "=", 2);
            })
            ->get();
        $positions = \App\Models\Position::where("author_id", "=", Auth::id())
            // and other or where "author_id","!=",Auth::id()) and status=2
            ->orwhere(function ($query) {
                $query
                    ->where("author_id", "!=", Auth::id())
                    ->where("status", "=", 2);
            })
            ->get();
        return view("profile.formwork", compact("categories", "positions"));
    }
}

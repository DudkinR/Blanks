<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\IconController;
class CategoryController extends Controller
{
    //
    public function index(Request $request)
    {
        //    return $request->all();
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

        if (isset($request->cat)) {
            $level = $request->cat;
        } else {
            $level = 0;
        }

        if (count($wrds) > 0) {
            $categories = \App\Models\Category::with("icon")
                ->with("categories")
                ->with("blanks")
                ->where("parent_id", "=", $level)
                ->where("author_id", "=", Auth::id())
                ->where(function ($query) use ($wrds) {
                    foreach ($wrds as $word) {
                        $query->where("name", "like", "%" . $word . "%");
                    }
                })
                // description
                ->orwhere(function ($query) use ($wrds) {
                    foreach ($wrds as $word) {
                        $query->where("description", "like", "%" . $word . "%");
                    }
                })
                ->orderBy("id", "asc")
                ->get();
            $freecategories = \App\Models\Category::with("icon")
                ->with("categories")
                ->with("blanks")
                ->where("status", "=", 2)
                ->where("parent_id", "=", $level)
                ->where("author_id", "!=", Auth::id())
                ->where(function ($query) use ($wrds) {
                    foreach ($wrds as $word) {
                        $query->where("name", "like", "%" . $word . "%");
                    }
                })
                // description
                ->orwhere(function ($query) use ($wrds) {
                    foreach ($wrds as $word) {
                        $query->where("description", "like", "%" . $word . "%");
                    }
                })
                ->orderBy("id", "asc")
                ->get();
            $categories = $categories->merge($freecategories);
        } else {
            $categories = \App\Models\Category::with("icon")
                ->with("categories")
                //->with("author")
                //->with("language")
                //->with("positions")
                ->with("blanks")
                ->where("parent_id", "=", $level)
                ->where("author_id", "=", Auth::id())
                ->orderBy("id", "asc")
                ->get();
            $freecategories = \App\Models\Category::with("icon")
                ->with("categories")
                //->with("author")
                //->with("language")
                //->with("positions")
                ->with("blanks")
                ->where("status", "=", 2)
                ->where("parent_id", "=", $level)
                ->where("author_id", "!=", Auth::id())
                ->orderBy("id", "asc")
                ->get();
            $categories = $categories->merge($freecategories);
        }
        //order by desc id
        if(!isset($request->order)||$request->order=='asc')
{
			$categories = $categories->sortBy("id");
		}
		else
		{
			$categories = $categories->sortByDesc("id");
		}
        return view("categories.index", compact("categories"));
    }
    public $badsymbols = [
        "!",
        '"',
        '\'',
        "[",
        "]",
        "@",
        "#",
        '$',
        "%",
        ",",
        ".",
        "/",
        "?",
        "&",
        "*",
        ":",
        ";",
        "(",
        ")",
        "+",
        "=",
        "<",
        ">",
    ];
    public function api_index(Request $request)
    {
        if (isset($request->cat)) {
            $level = $request->cat;
        } else {
            $level = 0;
        }
        if (isset($request->words)) {
            $words = explode(
                " ",
                str_replace($this->badsymbols, " ", $request->words)
            );
        } else {
            $words = [];
        }
        //return $words[0];
        if (count($words) > 0) {
            $categories = \App\Models\Category::where("parent_id", "=", $level)
                ->where("author_id", "=", Auth::id())
                ->orwhere(function ($query) use ($level) {
                    return $query
                        ->where("status", "=", 2)
                        ->where("parent_id", "=", $level);
                })
                ->where("name", "like", "%" . $words[0] . "%")
                ->orderBy("id", "asc")
                ->get();
        }
        //return $categories;
        $result = [];
        if (!isset($categories) || $categories->count() == 0) {
            $categories = \App\Models\Category::where("parent_id", "=", $level)
                ->where("author_id", "=", Auth::id())
                ->orwhere(function ($query) use ($level) {
                    return $query
                        ->where("status", "=", 2)
                        ->where("parent_id", "=", $level);
                })
                ->orderBy("id", "asc")
                ->get();
        }

        foreach ($categories as $cat) {
            if ($cat->author_id == Auth::id()) {
                $author = true;
            } else {
                $author = false;
            }
            $result[] = [
                "id" => $cat->id,
                "name" => $cat->name,
                "author" => $author,
                "lang" => $cat->lang,
                "description" => $cat->description,
                "icon_name" => $cat->icon->name,
                "icon_id" => $cat->image,
                "slug" => $cat->slug,
                "parent_id" => $cat->parent_id,
                "status" => $cat->status,
                "created_at" => $cat->created_at,
                "undercat" => $cat->categories->count(),
            ];
        }

        return $result;
    }

    public function create(Request $request)
    {
        if (isset($request->parent_id)) {
            $parent_id = $request->parent_id;
        } else {
            $parent_id = 0;
        }
        $icons = IconController::show($request);
        // return $icons;
        return view("categories.create", compact("parent_id", "icons"));
    }
    public function addcategory($blank)
    {
        return view("categories.create", compact("blank"));
    }
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request, [
            "name" => "string",
            "slug" => "string",
            "parent_id" => "integer",
            "image" => "integer",
            "status" => "integer",
            "description" => "string",
        ]);
        $category = new \App\Models\Category();
        // author id from session
        $category->author_id = Auth::id();
        $category->name = $request->name;
        $category->lang = $request->lang;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id;
        $category->description = $request->description;
        if ($request->image !== null) {
            $category->image = $request->image;
        } else {
            $image = \App\Models\Icon::pluck("id")
                ->random(1)
                ->toArray();
            $category->image = $image[0]; //???????????????????????????????????
        }
        if ($request->text_own !== null) {
            if ($request->text_color !== null) {
                $text_color = $request->text_color;
            } else {
                $text_color = "#000";
            }
            if ($request->bg_color !== null) {
                $bg_color = $request->bg_color;
            } else {
                $bg_color = "#FFF";
            }
            $category->image_own = json_encode([
                "text" => $request->text_own,
                "text_color" => $text_color,
                "bg_color" => $bg_color,
            ]);
            Session::put("text_color", $text_color);
            Session::put("bg_color", $bg_color);
        } else {
            $category->image_own = null;
        }
        //    return $category->image_own;
        $category->status = $request->status;
        Session::put("status", $request->status);
        $category->save();
        if (isset($request->blank)) {
            $category->blanks()->attach($request->blank);
            return redirect()->route("blanks.show", $request->blank);
        }
        //return redirect()->route('categories.index');
        return redirect("/categories?cat=" . $request->parent_id);
    }
    public function show($id)
    {
        $category = \App\Models\Category::find($id);
        $blanks = $category->blanks;
        return view("categories.show", compact("category", "blanks"));
    }
    public function edit($id)
    {
        $category = \App\Models\Category::find($id);
        if ($category->author_id !== Auth::id()) {
            return back();
        }
        return view("categories.edit", compact("category"));
    }
    public function update(Request $request, $id)
    {
        $category = \App\Models\Category::find($id);
        if ($category->author_id !== Auth::id()) {
            return back();
        }
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id;
        $category->description = $request->description;
        $category->image = $request->image;
        $category->status = $request->status;
        Session::put("status", $request->status);
        if ($request->text_own !== null) {
            if ($request->text_color !== null) {
                $text_color = $request->text_color;
            } else {
                $text_color = "#000";
            }
            if ($request->bg_color !== null) {
                $bg_color = $request->bg_color;
            } else {
                $bg_color = "#FFF";
            }
            $category->image_own = json_encode([
                "text" => $request->text_own,
                "text_color" => $text_color,
                "bg_color" => $bg_color,
            ]);
            Session::put("text_color", $request->text_color);
            Session::put("bg_color", $request->bg_color);
        } else {
            $category->image_own = null;
        }
        $category->save();
        return redirect("/categories?cat=" . $request->parent_id);
    }
    public function destroy($id)
    {
        $category = \App\Models\Category::find($id);
        if ($category->author_id !== Auth::id()) {
            return back();
        }
        $category->delete();
        return redirect()->route("categories.index", [
            "message" => "Category deleted",
        ]);
    }
    public function addblanks($id)
    {
        $category = \App\Models\Category::find($id);

        $blanks = \App\Models\Blank::where("author_id", "=", Auth::id())
            ->orwhere(function ($query) {
                return $query->where("status", "=", 2);
            })
            ->get();
        return view("categories.addblanks", compact("category", "blanks"));
    }
    public function belongsBlank(Request $request, $id)
    {
        $category = \App\Models\Category::find($id);
        if ($category->author_id !== Auth::id()) {
            return back();
        }
        $category->blanks()->sync($request->blanks);
        $blanks = $category->blanks;
        return view("categories.show", compact("category", "blanks"));
    }
    public function addexamplecategory($id)
    {
        // select category id and all under categories in array with id
        $category = \App\Models\Category::find($id);
        if ($category->author_id !== Auth::id()) {
            return back();
        }
        $array_id = [];
        function addId($id, $array)
        {
            // $array[]=$id; as integer

            $category = \App\Models\Category::find($id);
            $array[(int) $id] = $category->parent_id;
            $categories = $category->categories;
            foreach ($categories as $category) {
                $array = addId($category->id, $array);
            }
            return $array;
        }
        $array_id = addId($id, $array_id);
        $new_array = [];
        foreach ($array_id as $old_id => $parent) {
            if ($new_array == []) {
                $new_array[$old_id] = $this->copy_category($id, 0);
            } else {
                $new_array[$old_id] = $this->copy_category(
                    $old_id,
                    $new_array[$parent]
                );
            }
        }
        return redirect()->route("categories.index");
    }
    public function copy_category($id, $parent_id)
    {
        $category = \App\Models\Category::find($id);
        if ($category->author_id !== Auth::id()) {
            return back();
        }
        $new_category = new \App\Models\Category();
        $new_category->author_id = Auth::id();
        $new_category->name = $category->name;
        $new_category->slug = $category->slug;
        $new_category->parent_id = $parent_id;
        $new_category->description = $category->description;
        $new_category->image = $category->image;
        $new_category->status = $category->status;
        $new_category->save();
        return $new_category->id;
    }
}

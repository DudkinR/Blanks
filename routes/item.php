<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// items routes show create edit update destroy
Route::any("/items", [
    App\Http\Controllers\ItemController::class,
    "index",
])->name("item.index");
Route::get("item/create", [
    App\Http\Controllers\ItemController::class,
    "create",
])->name("item.create");
Route::post("/item", [
    App\Http\Controllers\ItemController::class,
    "store",
])->name("item.store");
Route::get("item/{item}", [
    App\Http\Controllers\ItemController::class,
    "show",
])->name("item.show");
Route::get("item/{item}/edit", [
    App\Http\Controllers\ItemController::class,
    "edit",
])->name("item.edit");
Route::put("item/{item}", [
    App\Http\Controllers\ItemController::class,
    "update",
])->name("item.update");
Route::delete("item/{item}", [
    App\Http\Controllers\ItemController::class,
    "destroy",
])->name("item.destroy");
Route::delete("itemdel/{item}", [
    App\Http\Controllers\ItemController::class,
    "del",
])->name("item.del");

Route::get("itemdel/{item}", [
    App\Http\Controllers\ItemController::class,
    "destroy",
])->name("item.del");
Route::get("additem/{blank}", [
    App\Http\Controllers\ItemController::class,
    "additem",
])->name("additem");
Route::get("addreadyitem/{blank}", [
    App\Http\Controllers\ItemController::class,
    "addreadyitem",
])->name("item.addreadyitem");
Route::get("addreadyitemI/{item}", [
    App\Http\Controllers\ItemController::class,
    "addreadyitemI",
])->name("item.addreadyitemI");
Route::post("addreadyitems", [
    App\Http\Controllers\ItemController::class,
    "addreadyitems",
])->name("item.addreadyitems");
Route::post("addreadyitemsI", [
    App\Http\Controllers\ItemController::class,
    "addreadyitemsI",
])->name("item.addreadyitemsI");
// route add example item
Route::get("/addexampleitem/{item}", [
    App\Http\Controllers\ItemController::class,
    "addexampleitem",
])->name("item.addexampleitem");

Route::post("shift_up", [
    App\Http\Controllers\ItemController::class,
    "shift_up",
])->name("item.shift_up");
Route::post("shift_down", [
    App\Http\Controllers\ItemController::class,
    "shift_down",
])->name("item.shift_down");
Route::post("insert_after", [
    App\Http\Controllers\ItemController::class,
    "insert_after",
])->name("item.insert_after");
//underblank.show
Route::get("/underblank/{blank}", [
    App\Http\Controllers\ItemController::class,
    "showUnderblank",
])->name("underblank.show");
Route::post("itemcopy", [
    App\Http\Controllers\ItemController::class,
    "copy",
])->name("item.copy");

Route::get("/api/search", function (Request $request) {
    $query = request("query");
    //return $query;
    $blanks = App\Models\Item::where("content", "like", "%{$query}%")
        ->take(5)
        ->get();
    return $blanks;
})->name("api.search");

//additemAjax
Route::post("/additemAjax", [
    App\Http\Controllers\ItemController::class,
    "additemAjax",
])->name("additemAjax");

//item.trashall 
Route::any("/item/trashall", [
    App\Http\Controllers\ItemController::class,
    "trashall",
])->name("item.trashall");
<?php 
use Illuminate\Support\Facades\Route;



// starts routes show create edit update destroy
Route::get("/start", [
    App\Http\Controllers\StartConditionController::class,
    "index",
])->name("start.index");
Route::get("start/create", [
    App\Http\Controllers\StartConditionController::class,
    "create",
])->name("start.create");
Route::post("/start", [
    App\Http\Controllers\StartConditionController::class,
    "store",
])->name("start.store");
Route::get("start/{start}", [
    App\Http\Controllers\StartConditionController::class,
    "show",
])->name("start.show");
Route::get("start/{start}/edit", [
    App\Http\Controllers\StartConditionController::class,
    "edit",
])->name("start.edit");
Route::put("start/{start}", [
    App\Http\Controllers\StartConditionController::class,
    "update",
])->name("start.update");
Route::delete("start/{start}", [
    App\Http\Controllers\StartConditionController::class,
    "destroy",
])->name("start.destroy");
Route::get("addstart/{blank}", [
    App\Http\Controllers\StartConditionController::class,
    "addstart",
])->name("addstart");
Route::get("addstartI/{item}", [
    App\Http\Controllers\StartConditionController::class,
    "addstartI",
])->name("addstartI");
Route::get("addstartsB/{blank}", [
    App\Http\Controllers\StartConditionController::class,
    "addstartsB",
])->name("addstartsB");
Route::post("addstartsB", [
    App\Http\Controllers\StartConditionController::class,
    "poststartsB",
])->name("poststartsB");
// route add example start
Route::get("/addexamplestart/{start}", [
    App\Http\Controllers\StartConditionController::class,
    "addexamplestart",
])->name("start.addexamplestart");

Route::put("start/{start}/up", [
    App\Http\Controllers\StartConditionController::class,
    "shift_up",
])->name("start.shift_up");
Route::put("start/{start}/down", [
    App\Http\Controllers\StartConditionController::class,
    "shift_down",
])->name("start.shift_down");

Route::put("start/{start}/dell", [
    App\Http\Controllers\StartConditionController::class,
    "dell",
])->name("start.dell");
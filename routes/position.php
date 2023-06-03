<?php 
use Illuminate\Support\Facades\Route;


// position routes show create edit update destroy
Route::get("/position", [
    App\Http\Controllers\PositionController::class,
    "index",
])->name("position.index");
Route::get("position/create", [
    App\Http\Controllers\PositionController::class,
    "create",
])->name("position.create");
Route::post("/position", [
    App\Http\Controllers\PositionController::class,
    "store",
])->name("position.store");
Route::get("position/{position}", [
    App\Http\Controllers\PositionController::class,
    "show",
])->name("position.show");
Route::get("position/{position}/edit", [
    App\Http\Controllers\PositionController::class,
    "edit",
])->name("position.edit");
Route::put("position/{position}", [
    App\Http\Controllers\PositionController::class,
    "update",
])->name("position.update");
Route::delete("position/{position}", [
    App\Http\Controllers\PositionController::class,
    "destroy",
])->name("position.destroy");
Route::get("position/addblankshow/{blank}", [
    App\Http\Controllers\PositionController::class,
    "addblankshow",
])->name("position.addblankshow");
Route::post("position/addblankposition", [
    App\Http\Controllers\PositionController::class,
    "addblankposition",
])->name("position.addblankposition");
Route::get("position/additemshow/{item}", [
    App\Http\Controllers\PositionController::class,
    "additemshow",
])->name("position.additemshow");
Route::post("position/additemposition", [
    App\Http\Controllers\PositionController::class,
    "additemposition",
])->name("position.additemposition");
// route add example position
Route::get("/addexampleposition/{position}", [
    App\Http\Controllers\PositionController::class,
    "addexampleposition",
])->name("position.addexampleposition");

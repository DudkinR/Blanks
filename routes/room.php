<?php 
use Illuminate\Support\Facades\Route;


// rooms routes show create edit update destroy
Route::get("/room", [
    App\Http\Controllers\RoomController::class,
    "index",
])->name("room.index");
Route::get("room/create", [
    App\Http\Controllers\RoomController::class,
    "create",
])->name("room.create");
Route::post("/room", [
    App\Http\Controllers\RoomController::class,
    "store",
])->name("room.store");
Route::get("room/{room}", [
    App\Http\Controllers\RoomController::class,
    "show",
])->name("room.show");
Route::get("room/{room}/edit", [
    App\Http\Controllers\RoomController::class,
    "edit",
])->name("room.edit");
Route::put("room/{room}", [
    App\Http\Controllers\RoomController::class,
    "update",
])->name("room.update");
Route::delete("room/{room}", [
    App\Http\Controllers\RoomController::class,
    "destroy",
])->name("room.destroy");
// route add example room
Route::get("/addexampleroom/{room}", [
    App\Http\Controllers\RoomController::class,
    "addexampleroom",
])->name("room.addexampleroom");

<?php 
use Illuminate\Support\Facades\Route;

// setting
Route::get("/set", [
    \App\Http\Controllers\UserController::class,
    "settingindex",
])->name("set.index");
Route::get("/set/create", [
    \App\Http\Controllers\UserController::class,
    "settingcreate",
])->name("setting.create");
Route::post("/set", [
    \App\Http\Controllers\UserController::class,
    "settingstore",
])->name("setting.store");
Route::get("/set/{user}/edit", [
    \App\Http\Controllers\UserController::class,
    "settingedit",
])->name("setting.edit");
Route::put("/set/{user}/update", [
    \App\Http\Controllers\UserController::class,
    "settingupdate",
])->name("setting.update");
Route::delete("/set/{user}", [
    \App\Http\Controllers\UserController::class,
    "settingdestroy",
])->name("setting.destroy");
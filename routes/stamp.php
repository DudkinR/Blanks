<?php
use Illuminate\Support\Facades\Route;

Route::get("/stamps", [
    App\Http\Controllers\StampController::class,
    "index",
])->name("stamp.index");

Route::get("stamp/", [
    App\Http\Controllers\StampController::class,
    "create",
])->name("stamp.create");

Route::post("stamp", [
    App\Http\Controllers\StampController::class,
    "store",
])->name("stamp.store");

Route::get("stamp/{stamp}", [
    App\Http\Controllers\StampController::class,
    "show",
])->name("stamp.show");

Route::get("stamp/{stamp}/edit", [
    App\Http\Controllers\StampController::class,
    "edit",
])->name("stamp.edit");

Route::put("stamp/{stamp}", [
    App\Http\Controllers\StampController::class,
    "update",
])->name("stamp.update");

Route::delete("stamp/{stamp}", [
    App\Http\Controllers\StampController::class,
    "destroy",
])->name("stamp.destroy");

Route::get("addstamps", [
    App\Http\Controllers\StampController::class,
    "addstamps",
])->name("addstamps");

Route::post("addblankstamp", [
    App\Http\Controllers\StampController::class,
    "storeBlankStamps",
])->name("stamp.addblankstamp");

Route::any("/addstamp", [
    \App\Http\Controllers\StampController::class,
    "api_addstamp",
])->name("api_addstamp");

// clear_all_stamps
Route::any("/clear_all_stamps/{blank_id}", [
    \App\Http\Controllers\StampController::class,
    "clear_all_stamps",
])->name("clear_all_stamps");

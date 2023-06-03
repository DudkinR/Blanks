<?php
use Illuminate\Support\Facades\Route;

// Blank routes show create edit update destroy
Route::get("/blanks", [
    App\Http\Controllers\BlankController::class,
    "index",
])->name("blanks.index");
Route::get("/blanks/create", [
    App\Http\Controllers\BlankController::class,
    "create",
])->name("blanks.create");
Route::post("/blanks", [
    App\Http\Controllers\BlankController::class,
    "store",
])->name("blanks.store");
Route::get("/blanks/{blank}", [
    App\Http\Controllers\BlankController::class,
    "show",
])->name("blanks.show");
Route::get("/blanks/{blank}/edit", [
    App\Http\Controllers\BlankController::class,
    "edit",
])->name("blanks.edit");

Route::any("/blanks/{blank}/stat", [
    App\Http\Controllers\StatistController::class,
    "stat",
])->name("blanks.stat");
Route::put("/blanks/{blank}", [
    App\Http\Controllers\BlankController::class,
    "update",
])->name("blanks.update");

Route::delete("/blanks/{blank}", [
    App\Http\Controllers\BlankController::class,
    "destroy",
])->name("blanks.destroy");
Route::get("/blanks/{blank}/wb", [
    App\Http\Controllers\BlankController::class,
    "work_blank",
])->name("blanks.wb");
Route::get("/blanks/{blank}/wbWP", [
    App\Http\Controllers\BlankController::class,
    "work_blankWP",
])->name("blanks.wbwp");
Route::get("/blanks/{blank}/wbP", [
    App\Http\Controllers\BlankController::class,
    "work_blankP",
])->name("blanks.wbp");
Route::any("/blanks/{blank}/work", [
    App\Http\Controllers\BlankController::class,
    "work",
])->name("blanks.work");
Route::post("/blanks/{blank}/workreturn", [
    App\Http\Controllers\BlankController::class,
    "work_return",
])->name("blanks.work_return");
Route::any("/blanks/{blank}/finish", [
    App\Http\Controllers\BlankController::class,
    "finish",
])->name("blanks.finish");

Route::any("/blanks/readyitemsform", [
    App\Http\Controllers\BlankController::class,
    "readyitemsform",
])->name("blanks.readyitemsform");

// route add example blank
Route::get("/addexample/{blank}", [
    App\Http\Controllers\BlankController::class,
    "addexample",
])->name("blanks.addexample");
Route::post("/blankscopy", [
    App\Http\Controllers\BlankController::class,
    "copy",
])->name("blanks.copy");
Route::post("/blankbuy/{id}", [
    App\Http\Controllers\BlankController::class,
    "buy_blank",
])->name("blanks.buy_blank");

<?php 
use Illuminate\Support\Facades\Route;



// finishs routes show create edit update destroy
Route::get("/finish", [
    App\Http\Controllers\FinishController::class,
    "index",
])->name("finish.index");
Route::get("finish/create", [
    App\Http\Controllers\FinishController::class,
    "create",
])->name("finish.create");
Route::post("/finish", [
    App\Http\Controllers\FinishController::class,
    "store",
])->name("finish.store");
Route::get("finish/{finish}", [
    App\Http\Controllers\FinishController::class,
    "show",
])->name("finish.show");
Route::get("finish/{finish}/edit", [
    App\Http\Controllers\FinishController::class,
    "edit",
])->name("finish.edit");
Route::put("finish/{finish}", [
    App\Http\Controllers\FinishController::class,
    "update",
])->name("finish.update");
Route::delete("finish/{finish}", [
    App\Http\Controllers\FinishController::class,
    "destroy",
])->name("finish.destroy");
Route::get("addfinish/{blank}", [
    App\Http\Controllers\FinishController::class,
    "addfinish",
])->name("addfinish");
Route::get("addfinishI/{item}", [
    App\Http\Controllers\FinishController::class,
    "addfinishI",
])->name("addfinishI");
Route::get("addfinishsB/{blank}", [
    App\Http\Controllers\FinishController::class,
    "addfinishsB",
])->name("addfinishsB");
Route::post("addfinishsB", [
    App\Http\Controllers\FinishController::class,
    "postfinishsB",
])->name("postfinishsB");
// route add example finish
Route::get("/addexamplefinish/{finish}", [
    App\Http\Controllers\FinishController::class,
    "addexamplefinish",
])->name("finish.addexamplefinish");
Route::put("finish/{finish}/up", [
    App\Http\Controllers\FinishController::class,
    "shift_up",
])->name("finish.shift_up");
Route::put("finish/{finish}/down", [
    App\Http\Controllers\FinishController::class,
    "shift_down",
])->name("finish.shift_down");
Route::put("finish/{finish}/dell", [
    App\Http\Controllers\FinishController::class,
    "dell",
])->name("finish.dell");
<?php 
use Illuminate\Support\Facades\Route;


// problems routes show create edit update destroy
Route::get("/problem", [
    App\Http\Controllers\ProblemController::class,
    "index",
])->name("problem.index");
Route::get("problem/create", [
    App\Http\Controllers\ProblemController::class,
    "create",
])->name("problem.create");
Route::post("/problemstore", 
[    App\Http\Controllers\ProblemController::class,    "store",]
)->name("problem.store");

Route::get("problem/{problem}", [
    App\Http\Controllers\ProblemController::class,
    "show",
])->name("problem.show");
Route::get("problem/{problem}/edit", [
    App\Http\Controllers\ProblemController::class,
    "edit",
])->name("problem.edit");
Route::put("problem/{problem}", [
    App\Http\Controllers\ProblemController::class,
    "update",
])->name("problem.update");
Route::delete("problem/{problem}", [
    App\Http\Controllers\ProblemController::class,
    "destroy",
])->name("problem.destroy");

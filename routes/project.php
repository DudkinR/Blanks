<?php
use Illuminate\Support\Facades\Route;

//route project.index
Route::get("/project", [
    \App\Http\Controllers\ProjectController::class,
    "index",
])->name("project.index");
Route::get("/project/create", [
    App\Http\Controllers\ProjectController::class,
    "create",
])->name("project.create");
Route::post("/project", [
    App\Http\Controllers\ProjectController::class,
    "store",
])->name("project.store");
Route::get("project/{project}", [
    App\Http\Controllers\ProjectController::class,
    "show",
])->name("project.show");
Route::get("projectr/{project}", [
    App\Http\Controllers\ProjectController::class,
    "replay",
])->name("project.replay");

Route::get("projectrg/{project}", [
    App\Http\Controllers\ProjectController::class,
    "replay_guest",
])->name("project.replayg");

Route::get("projecth/{project}", [
    App\Http\Controllers\ProjectController::class,
    "show",
])->name("project.head");

Route::get("project/{project}/edit", [
    App\Http\Controllers\ProjectController::class,
    "edit",
])->name("project.edit");
Route::put("project/{project}", [
    App\Http\Controllers\ProjectController::class,
    "update",
])->name("project.update");
Route::delete("project/{project}", [
    App\Http\Controllers\ProjectController::class,
    "destroy",
])->name("project.destroy");

Route::post("projectblank/{project}", [
    App\Http\Controllers\ProjectController::class,
    "projectblankdestroy",
])->name("projectblank.destroy");

Route::put("project/{project}/up", [
    App\Http\Controllers\ProjectController::class,
    "shift_up",
])->name("project.shift_up");
Route::put("project/{project}/down", [
    App\Http\Controllers\ProjectController::class,
    "shift_down",
])->name("project.shift_down");
Route::any("startproject/{project}", [
    App\Http\Controllers\ProjectController::class,
    "startproject",
])->name("project.startproject");
Route::get("/work/add", [
    \App\Http\Controllers\ProjectController::class,
    "api_work_add",
])->name("web.work.add");

Route::post("add_stamp_project_blank", [
    \App\Http\Controllers\StampController::class,
    "add_stamp_project_blank",
])->name("add_stamp_project_blank");

Route::post("project/addprojectblankstamp_R", [
    App\Http\Controllers\StampController::class,
    "addprojectblankstamp_R",
])->name("addprojectblankstamp_R");
Route::post("project/copy/{id}", [
    App\Http\Controllers\ProjectController::class,
    "copy",
])->name("projectblank.copy");
Route::get("project/buy/{id}", [
    App\Http\Controllers\ProjectController::class,
    "buy_project",
])->name("project.buy");
Route::get("project/show_guest/{id}", [
    App\Http\Controllers\ProjectController::class,
    "show_guest",
])->name("project.show_guest");

<?php
use Illuminate\Support\Facades\Route;

//profile
Route::get("/profile", [
    \App\Http\Controllers\UserController::class,
    "index",
])->name("profile.index");
Route::get("/profile/create", [
    \App\Http\Controllers\UserController::class,
    "create",
])->name("profile.create");
Route::post("/profile", [
    \App\Http\Controllers\UserController::class,
    "store",
])->name("profile.store");
Route::get("/profile/{user}/edit", [
    \App\Http\Controllers\UserController::class,
    "edit",
])->name("profile.edit");
Route::put("/profile/{user}/update", [
    \App\Http\Controllers\UserController::class,
    "update",
])->name("profile.update");
Route::delete("/profile/{user}", [
    \App\Http\Controllers\UserController::class,
    "destroy",
])->name("profile.destroy");
Route::get("/profile/ch", [
    \App\Http\Controllers\UserController::class,
    "profilepanel",
])->name("profile.panel");
Route::any("/formwork", [
    \App\Http\Controllers\UserController::class,
    "formwork",
])->name("profile.formwork");

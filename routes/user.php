<?php 
use Illuminate\Support\Facades\Route;
//route addmoney
Route::get("/addmoney", [
    \App\Http\Controllers\UserController::class,
    "index",
])->name("addmoney");

Route::get("/addmoney", [
    \App\Http\Controllers\UserController::class,
    "index",
])->name("addmoney");

Route::get("/looks", [
    \App\Http\Controllers\LooksController::class,
    "index",
])->name("looks");
Route::post("/looks/search", [
    \App\Http\Controllers\LooksController::class,
    "search",
])->name("looks.search");
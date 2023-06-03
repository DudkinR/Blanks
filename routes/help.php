<?php 
use Illuminate\Support\Facades\Route;


// route help.dificult
Route::get("/help/{item}", [
    \App\Http\Controllers\HelpController::class,
    "item",
])->name("help.item");

Route::get("/help", [
    \App\Http\Controllers\HelpController::class,
    "index",
])->name("help");
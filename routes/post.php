<?php 
use Illuminate\Support\Facades\Route;


Route::get("/posts", [
    App\Http\Controllers\PostController::class,
    "index",
])->name("posts.index");
Route::post("uploads", [App\Http\Controllers\PostController::class, "uploadImage"])->name(
    "posts.upload"
);

<?php
use Illuminate\Support\Facades\Route;

// Category routes show create edit update destroy
Route::any("/categories", [
    App\Http\Controllers\CategoryController::class,
    "index",
])->name("categories.index");
Route::get("/categories/create", [
    App\Http\Controllers\CategoryController::class,
    "create",
])->name("categories.create");
Route::post("/categories", [
    App\Http\Controllers\CategoryController::class,
    "store",
])->name("categories.store");
Route::get("/categories/{category}", [
    App\Http\Controllers\CategoryController::class,
    "show",
])->name("categories.show");
Route::get("/categories/{category}/edit", [
    App\Http\Controllers\CategoryController::class,
    "edit",
])->name("categories.edit");
Route::put("/categories/{category}", [
    App\Http\Controllers\CategoryController::class,
    "update",
])->name("categories.update");
Route::delete("/categories/{category}", [
    App\Http\Controllers\CategoryController::class,
    "destroy",
])->name("categories.destroy");
Route::get("/addblanks/{category}", [
    App\Http\Controllers\CategoryController::class,
    "addblanks",
])->name("categories.addblanks");
Route::post("/addblanks/{category}", [
    App\Http\Controllers\CategoryController::class,
    "belongsBlank",
])->name("categories.belongsBlank");
Route::get("addcategory/{blank}", [
    App\Http\Controllers\CategoryController::class,
    "addcategory",
])->name("addcategory");
// route add example category
Route::get("/addexamplecategory/{category}", [
    App\Http\Controllers\CategoryController::class,
    "addexamplecategory",
])->name("categories.addexamplecategory");

Route::get("/icons/show", [
    \App\Http\Controllers\IconController::class,
    "show",
])->name("icons.show");

Route::get("/categories/index", [
    \App\Http\Controllers\CategoryController::class,
    "api_index",
])->name("api.index");

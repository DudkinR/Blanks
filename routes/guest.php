<?php 
use Illuminate\Support\Facades\Route;

Route::get("/", [
    App\Http\Controllers\HomeController::class,
    "index",
])->name("home");

Route::get("guest/doc", [
    App\Http\Controllers\HomeController::class,
    "doc",
])->name("guest.doc");

Route::get("guest/about", [
    App\Http\Controllers\HomeController::class,
    "about",
])->name("guest.about");


Route::get("guest/faq", [
    App\Http\Controllers\HomeController::class,
    "faq",
])->name("guest.faq");
Route::get("guest/contacts", [
    App\Http\Controllers\HomeController::class,
    "contacts",
])->name("guest.contacts");
Route::get("guest/instr", [
    App\Http\Controllers\HomeController::class,
    "instr",
])->name("guest.instr");
Route::get("guest/service", [
    App\Http\Controllers\HomeController::class,
    "service",
])->name("guest.service");
Route::get("guest/examples", [
    App\Http\Controllers\HomeController::class,
    "examples",
])->name("guest.examples");
Route::get("guest/politics", [
    App\Http\Controllers\HomeController::class,
    "politics",
])->name("guest.politics");
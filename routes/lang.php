<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// route chenge language
Route::get("lang/{locale}", function ($locale) {
    Session::put("locale", $locale);
    // App::setLocale($locale);
    app()->setLocale(session()->get("locale"));
    return redirect()->back();
})->name("lang");

Route::get("/lang", function () {
    return view("profile.lang");
})->name("langselect");

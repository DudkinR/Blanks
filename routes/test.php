<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Faker\Factory;
//Route::resource('position', [App\Http\Controllers\PositionController::class,] );

Route::get("/test", function () {
    return view("test.squer");
})->name("test");

Route::get("/bootstrap", function () {
    $message = "Тестовый меседж bootstrap";
    return view("test.bootstrap", ["message" => $message]);
})->name("bootstrap");

Route::get("/icons", function () {
    return view("test.icons");
})->name("icons");

Route::post("/search", function () {
    return view("search");
})->name("search");

///api/search

//route chengecat
Route::any("/chengecat", function (Request $request) {
    return response()->json($request);
})->name("chengecat");
/* 
Route::get('/dashboard', function () {
  // Only users with the "user" role can access this route
})->middleware('user');

Route::get('/admin', function () {
  // Only users with the "superuser" role can access this route
})->middleware('superuser');

Route::get('/corporate', function () {
  // Only users with the "corporate" role can access this route
})->middleware('corporate');
 */

Route::get("/dashboard", function () {})->middleware([
    "user",
    "superuser",
    "admin",
    "corporate",
]);

Route::group(["middleware" => ["user", "superuser", "admin"]], function () {});

Route::group(["middleware" => ["admin"]], function () {});

// тест мидлвар для проверки авторизации
// для админ
Route::get("/admin", function () {
    return "admin";
})
    ->name("admin")
    ->middleware("auth", "admin");

// для юзера
Route::get("/user", function () {
    return "user";
})
    ->name("user")
    ->middleware("auth", "user");

// test.svg
Route::get("/svg", function () {
    return view("test.svg");
})->name("svg");

Route::get("/ses", function (Request $request) {
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (Auth::check()) {
    return Auth::user()->profile()->first()->lang;
} else {
    return "no auth";
}

      

})->name("ses"); //////////////////////////////////////////////////////////////////////////////////////////////////////////
// return test/ajax.blade.php
Route::get("/ajax", function () {
    return view("test.ajax");
})->name("ajax");
// route debug
Route::get("/debug", function (Request $request) {
    return debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT)[$request->fileid];
})->name("debug");
// route sql history
Route::get("/sql", function (Request $request) {
    return view("test.sql");
})->name("sql");
Route::get("/profile_test", [
    App\Http\Controllers\HomeController::class,
    "profile",
])->name("profile_test");
Route::post("/profile_test", [
    App\Http\Controllers\HomeController::class,
    "postprofile",
])->name("postprofile");
Route::get("/setting", [
    App\Http\Controllers\HomeController::class,
    "setting",
])->name("setting");
Route::post("/setting", [
    App\Http\Controllers\HomeController::class,
    "postsetting",
])->name("postsetting");

Route::get("/svgabvtest", function () {
    return view("test.svgabv");
})->name("postsetting5");

// test new menu view
Route::get("/menu", function () {
	return view("test.menu");
})->name("menutest");

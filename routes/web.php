<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get(
    "login/google",
    "\App\Http\Controllers\Auth\LoginController@redirectToGoogle"
);
Route::get(
    "login/google/callback",
    "\App\Http\Controllers\Auth\LoginController@handleGoogleCallback"
);

require __DIR__ . "/guest.php";
require __DIR__ . "/help.php";
require __DIR__ . "/lang.php";

Route::group(["middleware" => "auth"], function () {
require __DIR__ . "/admin.php";
require __DIR__ . "/blank.php";
require __DIR__ . "/cat.php";
require __DIR__ . "/corp.php";
require __DIR__ . "/ideas.php";
require __DIR__ . "/item.php";
require __DIR__ . "/finish.php";
require __DIR__ . "/position.php";
require __DIR__ . "/post.php";
require __DIR__ . "/problem.php";
require __DIR__ . "/profile.php";
require __DIR__ . "/project.php";
require __DIR__ . "/setting.php";
require __DIR__ . "/stamp.php";
require __DIR__ . "/start.php";
require __DIR__ . "/suser.php";
require __DIR__ . "/user.php";
   //route home - > profile.main
    Route::get("/home", function () {
        return view("profile.main");
    })->name("homep");
});

require __DIR__ . "/test.php";
Auth::routes();
Auth::routes(["verify" => true]);

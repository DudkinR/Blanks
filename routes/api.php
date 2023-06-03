<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Auth;
// session
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
    return $request->user();
});

Route::get("/work/add", [
    \App\Http\Controllers\ProjectController::class,
    "api_work_add",
])->name("api.work.add");
// addstamp

// test session api
Route::middleware("auth:api")->group(function () {
    Route::get("/test2", function (Request $request) {
        $user = $request->user();
        return $user;
    });
});

Route::get("/test", function (Request $request) {
    return Auth::user();
});

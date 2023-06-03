<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Route::get("/adm", function(){
    return view('admin.main');
})->name("adm");

Route::get("/roles", [
    \App\Http\Controllers\RoleController::class,
    "index",
])->name("roles.index");
Route::get("/roles/create", [
    \App\Http\Controllers\RoleController::class,
    "create",
])->name("roles.create");
Route::post("/roles", [
    \App\Http\Controllers\RoleController::class,
    "store",
])->name("roles.store");
Route::get("/roles/{role}", [
    \App\Http\Controllers\RoleController::class,
    "show",
])->name("roles.show");
Route::get("/roles/{role}/edit", [
    \App\Http\Controllers\RoleController::class,
    "edit",
])->name("roles.edit");
Route::put("/roles/{role}", [
    \App\Http\Controllers\RoleController::class,
    "update",
])->name("roles.update");
Route::delete("/roles/{role}", [
    \App\Http\Controllers\RoleController::class,
    "destroy",
])->name("roles.destroy");
// roles.users
Route::get("/rolesusers", [
    \App\Http\Controllers\RoleController::class,
    "users",
])->name("roles.users");
// role.user.show
Route::get("/rolesusers/{user}", [
    \App\Http\Controllers\RoleController::class,
    "usershow",
])->name("role.user.show");
// role.user.edit
Route::get("/rolesusers/{user}/edit", [
    \App\Http\Controllers\RoleController::class,
    "useredit",
])->name("role.user.edit");
// role userUpdate
Route::put("/rolesusers/{user}", [
    \App\Http\Controllers\RoleController::class,
    "userupdate",
])->name("role.user.update");
Route::get("/clear-full", function () {
    $exitCode = Artisan::call("config:clear");
    $exitCode = Artisan::call("cache:clear");
    $exitCode = Artisan::call("clear-compiled");
    $exitCode = Artisan::call("route:clear");
    $exitCode = Artisan::call("view:clear");
    $exitCode = Artisan::call("optimize");
    return "DONE config cache compiled route view optimize"; //Return anything
})->name("clear-full");
// Clear application cache:
Route::get("/clear-cache", function () {
    $exitCode = Artisan::call("cache:clear");
    return "DONE"; //Return anything
})->name("clear-cache");
// Clear application config:
Route::get("/clear-config", function () {
    $exitCode = Artisan::call("config:clear");
    return "DONE clear config"; //Return anything
})->name("clear-config");
// Clear application route:
Route::get("/clear-route", function () {
    $exitCode = Artisan::call("route:clear");
    return "DONE clear route"; //Return anything
})->name("clear-route");
// Clear application view:
Route::get("/clear-view", function () {
    $exitCode = Artisan::call("view:clear");
    return "DONE clear view"; //Return anything
})->name("clear-view");
// Clear application compiled:
Route::get("/clear-compiled", function () {
    $exitCode = Artisan::call("clear-compiled");
    return "DONE clear compiled"; //Return anything
})->name("clear-compiled");
// Clear application optimize:
Route::get("/clear-optimize", function () {
    $exitCode = Artisan::call("optimize");
    return "DONE clear optimize"; //Return anything
})->name("clear-optimize");
// Clear application optimize:
Route::get("/clear-all", function () {
    $exitCode = Artisan::call("optimize:clear");
    return "DONE clear optimize:clear"; //Return anything
})->name("clear-all");
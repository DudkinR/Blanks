<?php
use Illuminate\Support\Facades\Route;

// middleware create and store auth for all roles accept guest
//ccess-user-routes
Route::middleware(["auth"])->group(function () {
    Route::get("idea/create", [
        App\Http\Controllers\IdeaController::class,
        "create",
    ])->name("idea.create");
    Route::post("/idea", [
        App\Http\Controllers\IdeaController::class,
        "store",
    ])->name("idea.store");
});

// ideas routes show create edit update destroy

//access-admin-routes
Route::middleware(["auth", "can:access-admin-routes"])->group(function () {
    Route::get("/idea", [
        App\Http\Controllers\IdeaController::class,
        "index",
    ])->name("idea.index");

    Route::get("idea/{idea}", [
        App\Http\Controllers\IdeaController::class,
        "show",
    ])->name("idea.show");
    Route::get("idea/{idea}/edit", [
        App\Http\Controllers\IdeaController::class,
        "edit",
    ])->name("idea.edit");
    Route::put("idea/{idea}", [
        App\Http\Controllers\IdeaController::class,
        "update",
    ])->name("idea.update");
    Route::delete("idea/{idea}", [
        App\Http\Controllers\IdeaController::class,
        "destroy",
    ])->name("idea.destroy");

    Route::put("idea/{idea}/dell", [
        App\Http\Controllers\IdeaController::class,
        "dell",
    ])->name("idea.dell");
});

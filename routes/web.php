<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::post("/register", [UserController::class, "register"])->name('register');
Route::post("/login", [UserController::class, "login"])->name('login');
Route::get("/viewregister", [UserController::class, "viewregister"])->name('viewregister');
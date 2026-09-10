<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::post("/register", [UserController::class, "register"])->name('register');
Route::get("/login", [UserController::class, "login"])->name('login');
Route::get("/logout", [UserController::class, "logout"])->name('logout');
Route::get("/viewregister", [UserController::class, "viewregister"])->name('viewregister');
Route::get("/viewlogin", [UserController::class, "viewlogin"])->name('viewlogin');
Route::get("/homepage", [UserController::class, "homepage"])->name('homepage');
Route::get("/userprofileview", [UserController::class, "userprofileview"])->name('userprofileview');
Route::get("/adminpanel", [UserController::class, "adminpanel"])->name('adminpanel');

Route::get("/orderview", [OrderController::class, "orderview"])->name('orderview');
Route::post("/orderform", [OrderController::class, "orderform"])->name('orderform');
Route::get("/order", [OrderController::class, 'order'])->name('order');
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(\App\Http\Controllers\AdminController::class)->group(function() {
    Route::get("/dashboard", "dashboard");
    Route::get("/data", "data");
    Route::post("/data", "postData");
    Route::get("/data/tambah", "tambahMobil");
    Route::post("/data/tambah", "postTambahMobil");

    Route::get("/data/update/{id}", "update")
      ->where("id", "[0-9]+")
      ->name("update");
    Route::post("/data/update", "postUpdate")
      ->name("postUpdate");

    Route::get("/data/delete/{id}", "delete")
      ->where("id", "[0-9]+")
      ->name("delete");
});

Route::controller(\App\Http\Controllers\UserController::class)
  ->group(function() {
    Route::get("/login", "login")
      ->name("login");
    Route::post("/login", "postLogin")
      ->name("postLogin");
  });

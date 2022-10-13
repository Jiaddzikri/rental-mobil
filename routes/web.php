<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
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

Route::controller(HomeController::class)->group(function () {
  Route::get("/", "index");
  Route::get("/about", "about");
  Route::get("/data/mobil", "dataMobil");
});

Route::controller(AdminController::class)->group(function () {
  Route::get("/dashboard", "dashboard")
    ->middleware([AdminMiddleware::class]);
  Route::get("/data", "data")
    ->middleware([AdminMiddleware::class]);
  Route::post("/data", "postData")
    ->middleware([AdminMiddleware::class]);
  Route::get("/data/tambah", "tambahMobil")
    ->middleware([AdminMiddleware::class]);
  Route::post("/data/tambah", "postTambahMobil")
    ->middleware([AdminMiddleware::class]);
  Route::get("/admin/services/data", "listDataServices")
    ->middleware([AdminMiddleware::class]);
  Route::get("/admin/services", "listIconServices")
    ->middleware([AdminMiddleware::class]);
  Route::post("/admin/services", "addListServices")
    ->middleware([AdminMiddleware::class]);

  Route::get("/data/update/{id}", "update")
    ->where("id", "[0-9]+")
    ->name("update")
    ->middleware([AdminMiddleware::class]);

  Route::post("/data/update", "postUpdate")
    ->name("postUpdate")
    ->middleware([AdminMiddleware::class]);

  Route::get("/data/delete/{id}", "delete")
    ->where("id", "[0-9]+")
    ->name("delete")
    ->middleware([AdminMiddleware::class]);

//  Api Endpoint
  Route::get("/services/data/{id}", "dataServicesApi")
    ->where("id", "[0-9]+");
});

Route::controller(UserController::class)
  ->group(function () {
    Route::get("/login", "login")
      ->name("login");
    Route::post("/login", "postLogin")
      ->name("postLogin");
  });

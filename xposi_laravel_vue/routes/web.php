<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HeroController;

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

Route::prefix("/admin")->group(function(){
    Route::group(["middleware" => "guest"], function () {
        Route::get("/login", [LoginController::class, "index"]);
    });
        //hero
    Route::resource("hero", HeroController::class);
        //login
    Route::post("/login", [LoginController::class, "post_login"]);
        //autentikasi
    Route::group(["middleware" => "autentikasi"], function () {
        // Logout
    Route::get('/logout', [LoginController::class, "logout"]);
        // Dashboard
    Route::get("/dashboard", [DashboardController::class, "dashboard"]);
    });
});

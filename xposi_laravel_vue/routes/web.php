<?php

use App\Http\Controllers\BackEnd\AboutController;
use App\Http\Controllers\BackEnd\EventController;
use App\Http\Controllers\BackEnd\FeaturesController;
use App\Http\Controllers\BackEnd\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BackEnd\HeroController;
use App\Http\Controllers\BackEnd\HowBookController;
use App\Http\Controllers\BackEnd\ProfileAdministratorController;
use App\Http\Controllers\BackEnd\ProfileCompanyController;

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
        //about
    Route::resource("about", AboutController::class);
        //features
    Route::resource("features", FeaturesController::class);
        //event_newest
    Route::resource("event_newest", EventController::class);
        //how to book
    Route::resource("how_book", HowBookController::class);

        //gallery
    Route::get("/gallery/edit", [GalleryController::class, "edit"]);
    Route::put("/gallery/simpan", [GalleryController::class, "update"]);
    Route::resource("gallery", GalleryController::class);

        //profile_company
    Route::resource("profile_company", ProfileCompanyController::class);
        // Profil Administrator
    Route::put("profile_administrator/simpan", [ProfileAdministratorController::class, "simpan"]);
    Route::resource('profile_administrator', ProfileAdministratorController::class);
        //login
    Route::post("/login", [LoginController::class, "post_login"]);
        //login_information
    Route::get("/login_information", [DashboardController::class, "login_information"]);
        //autentikasi
    Route::group(["middleware" => "autentikasi"], function () {
        // Logout
    Route::get('/logout', [LoginController::class, "logout"]);
        // Dashboard
    Route::get("/dashboard", [DashboardController::class, "dashboard"]);
    });
});

<?php

use App\Http\Controllers\API\AboutApiController;
use App\Http\Controllers\API\FeaturesApiController;
use App\Http\Controllers\API\HeroApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource("/about", AboutApiController::class);
Route::resource("/hero", HeroApiController::class);
Route::resource("/features", FeaturesApiController::class);

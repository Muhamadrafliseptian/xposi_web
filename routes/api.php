<?php
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type,Accept, Access-Control-Requested-Method, Authorization');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
?>

<?php

use App\Http\Controllers\API\AboutApiController;
use App\Http\Controllers\API\EventApiController;
use App\Http\Controllers\API\FeaturesApiController;
use App\Http\Controllers\API\GalleryApiController;
use App\Http\Controllers\API\HeroApiController;
use App\Http\Controllers\API\HowBookApiController;
use App\Http\Controllers\API\ProfileCompanyApiController;
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
Route::resource("/how_book", HowBookApiController::class);
Route::resource("/event_newest", EventApiController::class);
Route::resource("/features", FeaturesApiController::class);
Route::resource("/gallery", GalleryApiController::class);
Route::resource("/profile_company", ProfileCompanyApiController::class);

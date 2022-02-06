<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WebsiteInfoController;
use App\Http\Controllers\Api\InfoController;
use App\Http\Controllers\Api\ContactController;

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

// Route get infomation website
Route::resource('website_infomation', WebsiteInfoController::class)->only(['index', 'edit', 'update']);
Route::get('download/mycv', [WebsiteInfoController::class, 'downloadMyCV'])->name("download.mycv");

// Route get infomation
Route::resource('infomation', InfoController::class)->only(['index', 'store', 'edit', 'update']);

// Route for contact page
Route::resource('contact', ContactController::class)->only("store");

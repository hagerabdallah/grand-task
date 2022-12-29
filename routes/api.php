<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User_API\{CategoryController,
    TagController,AdvertismentTypeController,
    AdvertismentController};

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/tag')->group(function () {
    Route::get('/index'        , [TagController::class, 'index']);
    Route::post('/store'       , [TagController::class, 'store']);
    Route::get('/edit'         , [TagController::class, 'edit']);
    Route::PUT('/update'       , [TagController::class, 'update']);
    Route::DELETE('/delete'    , [TagController::class, 'delete']);

});
Route::prefix('/category')->group(function () {
    Route::get('/index'        , [CategoryController::class, 'index']);
    Route::post('/store'       , [CategoryController::class, 'store']);
    Route::get('/edit'         , [CategoryController::class, 'edit']);
    Route::PUT('/update'       , [CategoryController::class, 'update']);
    Route::DELETE('/delete'    , [CategoryController::class, 'delete']);

});
Route::prefix('/advertisment-type')->group(function () {
    Route::get('/index'        , [AdvertismentTypeController::class, 'index']);
    Route::post('/store'       , [AdvertismentTypeController::class, 'store']);
    Route::get('/edit'         , [AdvertismentTypeController::class, 'edit']);
    Route::PUT('/update'       , [AdvertismentTypeController::class, 'update']);
    Route::DELETE('/delete'    , [AdvertismentTypeController::class, 'delete']);

});
Route::prefix('/advertisment')->group(function () {
    Route::get('/index'        , [AdvertismentController::class, 'index']);
    Route::get('/create'       , [AdvertismentController::class, 'create']);
    Route::post('/store'       , [AdvertismentController::class, 'store']);
    Route::get('/edit'         , [AdvertismentController::class, 'edit']);
    Route::PUT('/update'       , [AdvertismentController::class, 'update']);
    Route::DELETE('/delete'    , [AdvertismentController::class, 'delete']);
    Route::get('/filter'        , [AdvertismentController::class, 'filter']);


});


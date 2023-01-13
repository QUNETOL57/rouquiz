<?php

use App\Http\Controllers\TestController;
use App\Http\Resources\TestResource;
use App\Models\Test;
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


//Route::get('/test/{id}', function ($id) {
//    return new TestResource(Test::findOrFail($id));
//});

Route::apiResource('/test', TestController::class);

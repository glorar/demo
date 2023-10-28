<?php

use App\Http\Controllers\ZoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('zoom/token', [ZoomController::class, 'token']);
Route::get('zoom/user-info', [ZoomController::class, 'userInfo']);
Route::get('zoom/meetings', [ZoomController::class, 'meetings']);
Route::post('zoom/meetings', [ZoomController::class, 'meetingCreate']);
Route::patch('zoom/meetings/{id}', [ZoomController::class, 'meetingUpdate']);
Route::delete('zoom/meetings/{id}', [ZoomController::class, 'meetingDelete']);

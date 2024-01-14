<?php

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

// User Agent
Route::get('resources', function () {
    return response()->json([
       'message' => 'Request success'
    ]);
})
    ->middleware('user_agent');

// Multiplication
Route::post('multiplication', function () {
    return response()->json(
        request()->all()
    );
})
    ->middleware('multiplication');

// Test Group
Route::prefix('test')->middleware('admin')->group(function () {
    Route::get('one', function () {return response('success', 200);});
    Route::get('two', function () {return response('success', 200);});
    Route::get('three', function () {return response('success', 200);});
    Route::get('four', function () {return response('success', 200);});
});

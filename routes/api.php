<?php

use App\Http\Controllers\EventController;
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

Route::prefix('/event')->group(function(){
    Route::get('/view', [EventController::class, 'getEvent'])->name('getEvent');
    Route::get('/view/{id}', [EventController::class, 'getEventbyId'])->name('getEventbyId');
    Route::post('/create', [EventController::class, 'createEvent'])->name('createEvent');
    Route::post('/update/{id}', [EventController::class, 'updateEvent'])->name('updateEvent');
    Route::delete('/delete/{id}', [EventController::class, 'deleteEvent'])->name('deleteEvent');
});

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

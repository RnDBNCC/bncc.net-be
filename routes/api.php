<?php

use App\Http\Controllers\HistoryController;
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
Route::prefix('/history')->group(function(){
    Route::post('/create', [HistoryController::class, 'createHistory'])->name('createHistory');
    Route::post('/update/{id}', [HistoryController::class, 'updateHistory'])->name('updateHistory');
    Route::get('/view', [HistoryController::class, 'viewHistory'])->name('viewHistory');
    Route::get('/view/{id}', [HistoryController::class, 'getHistoryById'])->name('getHistoryById');
    Route::delete('/delete/{id}', [HistoryController::class, 'deleteHistory'])->name('deleteHistory');
});

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

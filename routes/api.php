<?php

use App\Http\Controllers\StructureController;
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

Route::prefix('/structure')->group(function(){
    Route::post('/create', [StructureController::class, 'createStructure'])->name('createStructure');
    Route::patch('/update/{id}', [StructureController::class, 'updateStructure'])->name('updateStructure');
    Route::delete('/delete/{id}', [StructureController::class, 'deleteStructure'])->name('deleteStructure');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

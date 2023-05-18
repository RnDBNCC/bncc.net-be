<?php

use App\Http\Controllers\MissionController;
use App\Http\Controllers\VisionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware('isAdmin')->group(function(){

});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('isAdmin')->group(function(){
    Route::prefix('/admin')->group(function(){
        Route::prefix('/mission')->group(function(){
            Route::get('/create', [MissionController::class, 'create_mission'])->name('create_mission');
            Route::patch('/update/{id}', [MissionController::class, 'update_mission'])->name('update_mission');
            Route::get('/edit/{id}', [MissionController::class, 'edit_mission'])->name('edit_mission');
            Route::get('/view', [MissionController::class, 'view_mission'])->name('view_mission');
            Route::post('/store', [MissionController::class, 'store_mission'])->name('store_mission');
            Route::delete('/delete/{id}', [MissionController::class, 'delete_mission'])->name('delete_mission');
            Route::post('/update/{id}', [MissionController::class, 'update_mission'])->name('update_mission');
            // Route::get('/edit/', [ 'as' => 'users.edit', 'uses' => 'UserController@edit']);
        });

        Route::prefix('/vision')->group(function(){
            Route::get('/create', [VisionController::class, 'create_vision'])->name('create_vision');
            Route::patch('/update/{id}', [VisionController::class, 'update_vision'])->name('update_vision');
            Route::get('/edit/{id}', [VisionController::class, 'edit_vision'])->name('edit_vision');
            Route::get('/view', [VisionController::class, 'view_vision'])->name('view_vision');
            Route::post('/store', [VisionController::class, 'store_vision'])->name('store_vision');
            Route::delete('/delete/{id}', [VisionController::class, 'delete_vision'])->name('delete_vision');
            Route::post('/update/{id}', [VisionController::class, 'update_vision'])->name('update_vision');
        });
    });
});

require __DIR__.'/auth.php';

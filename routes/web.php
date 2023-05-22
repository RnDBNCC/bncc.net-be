<?php

use App\Http\Controllers\HistoryController;
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
    Route::prefix('/admin')->group(function(){
        Route::prefix('/history')->group(function(){
            Route::get('/create', [HistoryController::class, 'create_history'])->name('create_history');
            Route::patch('/update/{id}', [HistoryController::class, 'update_history'])->name('update_history');
            Route::get('/edit/{id}', [HistoryController::class, 'edit_history'])->name('edit_history');
            Route::get('/view', [HistoryController::class, 'view_history'])->name('view_history');
            Route::post('/store', [HistoryController::class, 'store_history'])->name('store_history');
            Route::delete('/delete/{id}', [HistoryController::class, 'delete_history'])->name('delete_history');
            Route::post('/update/{id}', [HistoryController::class, 'update_history'])->name('update_history');
        });
    });
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StructureController;
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
        Route::prefix('/structure')->group(function(){
            Route::get('/', [StructureController::class, 'view'])->name('view');
            Route::get('/view/{region}', [StructureController::class, 'filterRegion']);
            Route::get('/create', [StructureController::class, 'create'])->name('create');
            Route::post('/store', [StructureController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [StructureController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [StructureController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [StructureController::class, 'delete'])->name('delete');
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

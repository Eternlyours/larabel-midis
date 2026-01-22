<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function() {
    Route::get('/reports', [ReportController::class, 'index'])->name('report.index');

    Route::get('/reports/create', function() {
        return view('report.create');
    })->name('reports.create');

    Route::delete('/reports/{report}', [ReportController::class, 'delete'])->name('reports.delete');

    Route::post('/reports', [ReportController::class, 'store']) -> name('reports.store');

    Route::get('/reports/{report}/edit', [ReportController::class, 'show'])->name('reports.show');

    Route::put('/reports/{report}/', [ReportController::class, 'update'])->name('reports.update');
});


require __DIR__.'/auth.php';



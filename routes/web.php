<?php

use App\Http\Controllers\ReportController;
use App\Models\Report;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/reports', [ReportController::class, 'index'])->name('report.index');



Route::get('/reports/create', function() {
    return view('report.create');
})->name('reports.create');

Route::delete('/reports/{report}', [ReportController::class, 'delete'])->name('reports.delete');

Route::post('/reports', [ReportController::class, 'store']) -> name('reports.store');

Route::get('/reports/{report}/edit', [ReportController::class, 'show'])->name('reports.show');

Route::put('/reports/{report}/', [ReportController::class, 'update'])->name('reports.update');
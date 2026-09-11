<?php

use App\Data\PortfolioData;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $portfolio = PortfolioData::all();

    return view('portfolio', $portfolio);
});

// Tiny admin area to edit certificate titles/org/dates.
Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->middleware('admin');

    Route::middleware('admin')->group(function (): void {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::put('/certificates/{certificate}', [AdminController::class, 'update'])->name('update');
    });
});

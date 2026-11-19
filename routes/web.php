<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShuttleController;

Route::get('/shuttles/export-pdf', [ShuttleController::class, 'exportPdf'])->name('shuttles.export-pdf');

Route::resource('shuttles', ShuttleController::class)->except('show');

Route::get('/', function () {
    return view('welcome');
});

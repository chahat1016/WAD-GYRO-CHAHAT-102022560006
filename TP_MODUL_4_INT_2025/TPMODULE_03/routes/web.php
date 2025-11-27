<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KucingController;

Route::get('/', function () {
    return redirect('/cats');
});

Route::get('/cats', [KucingController::class, 'index'])->name('cats.index');

Route::get('/cats/{id}', [KucingController::class, 'show'])->name('cats.show');

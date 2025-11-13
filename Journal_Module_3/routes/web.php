
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route for the Dashboard page
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route for the Profile page
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Optional: Redirect the root URL to the dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});
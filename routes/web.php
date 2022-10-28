<?php

use App\Http\Controllers\SalesRepresentativeController;
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


Route::get('/login', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('sales-representatives', SalesRepresentativeController::class);
});

require __DIR__.'/auth.php';

Route::fallback(function () {
  return redirect()->route('login');
});

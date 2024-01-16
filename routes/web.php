<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/horaire', function () {
    return view('horaire');
})->middleware(['auth', 'verified'])->name('horaire');

Route::get('/reservation', function () {
    return view('reservation');
})->middleware(['auth', 'verified'])->name('reservation');

Route::get('/billet', function () {
    return view('billet');
})->middleware(['auth', 'verified'])->name('billet');


Route::post('reservation', [ReservationController::class, 'create'])->name('reservation');
//Route::get('billet', [ReservationController::class, 'billet'])->name('billet');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

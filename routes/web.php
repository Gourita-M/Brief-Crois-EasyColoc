<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccommodationController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/Accommodation', [DashboardController::class, 'index'])->middleware('auth');

Route::post('/Create', [AccommodationController::class, 'create'])->name('Create.accommodation');
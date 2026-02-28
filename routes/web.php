<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\ExpensesController;
use App\Mail\TestMail;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\PaymentController;

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

Route::get('/Accommodation/user', [DashboardController::class, 'userIndex'])->middleware('auth');

Route::post('/Create', [AccommodationController::class, 'create'])->name('Create.accommodation');

Route::post('/Join', [AccommodationController::class, 'joinAccommodation'])->name('join.home');

Route::post('/Expenses', [ExpensesController::class, 'createExpense'])->name('add.expenses');

Route::post('/Mail', [InvitationController::class, 'sendemail'])->name('Email.Sent');

Route::get('/Invitation-Link/{token}', [InvitationController::class, 'invitation'])->middleware('auth');

Route::post('/Approve', [InvitationController::class, 'acceptInvitation'])->name('aprove.invite')->middleware('auth');

Route::Post('/Decline', [InvitationController::class, 'declineInvitation'])->name('decline.invite')->middleware('auth');

Route::POST('/PayExpense', [PaymentController::class, 'payAnExpense'])->name('pay.expense');
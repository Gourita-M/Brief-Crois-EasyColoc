<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\ExpensesController;
use App\Mail\TestMail;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin' // move admin here for clarity
])->group(function () {
    
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboard');

});

Route::get('/Accommodation', [OwnerDashboardController::class, 'index'])->middleware('auth');

Route::get('/Accommodation/user', [UserDashboardController::class, 'userIndex'])->middleware('auth');

Route::post('/Create', [AccommodationController::class, 'create'])->name('Create.accommodation');

Route::post('/Join', [AccommodationController::class, 'joinAccommodation'])->name('join.home');

Route::post('/Expenses', [ExpensesController::class, 'createExpense'])->name('add.expenses');

Route::post('/Mail', [InvitationController::class, 'sendemail'])->name('Email.Sent');

Route::get('/Invitation-Link/{token}', [InvitationController::class, 'invitation'])->middleware('auth');

Route::post('/Approve', [InvitationController::class, 'acceptInvitation'])->name('aprove.invite')->middleware('auth');

Route::Post('/Decline', [InvitationController::class, 'declineInvitation'])->name('decline.invite')->middleware('auth');

Route::POST('/PayExpense', [PaymentController::class, 'payAnExpense'])->name('pay.expense');

Route::POST('/Remove/Member', [MembershipController::class, 'removeMember'])->name('remove.member');

Route::POST('/Leave', [MembershipController::class, 'leaveMembership'])->name('leave.accommodation');

Route::POST('/ban-user', [AdminController::class, 'banUser'])->name('ban.user')->middleware('admin');

Route::POST('/unban-user', [AdminController::class, 'unbanUser'])->name('unban.user')->middleware('admin');

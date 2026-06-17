<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MotorController;

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::resource('categories', CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
    ]);
    
    Route::resource('motors', App\Http\Controllers\Admin\MotorController::class)->names([
        'index' => 'admin.motors.index',
        'create' => 'admin.motors.create',
        'store' => 'admin.motors.store',
        'edit' => 'admin.motors.edit',
        'update' => 'admin.motors.update',
        'destroy' => 'admin.motors.destroy',
    ]);

    Route::resource('users', App\Http\Controllers\Admin\UserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);

    Route::resource('vouchers', App\Http\Controllers\Admin\VoucherController::class)->names([
        'index' => 'admin.vouchers.index',
        'create' => 'admin.vouchers.create',
        'store' => 'admin.vouchers.store',
        'edit' => 'admin.vouchers.edit',
        'update' => 'admin.vouchers.update',
        'destroy' => 'admin.vouchers.destroy',
    ]);

    Route::resource('bookings', App\Http\Controllers\Admin\BookingController::class)->only(['index', 'edit', 'update'])->names([
        'index' => 'admin.bookings.index',
        'edit' => 'admin.bookings.edit',
        'update' => 'admin.bookings.update',
    ]);

    Route::get('messages', [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('admin.messages.index');
    Route::get('messages/{message}', [App\Http\Controllers\Admin\MessageController::class, 'show'])->name('admin.messages.show');
    Route::post('messages/{message}/reply', [App\Http\Controllers\Admin\MessageController::class, 'reply'])->name('admin.messages.reply');

    Route::resource('faqs', App\Http\Controllers\Admin\FaqController::class)->names([
        'index' => 'admin.faqs.index',
        'create' => 'admin.faqs.create',
        'store' => 'admin.faqs.store',
        'edit' => 'admin.faqs.edit',
        'update' => 'admin.faqs.update',
        'destroy' => 'admin.faqs.destroy',
    ]);

    Route::resource('app_infos', App\Http\Controllers\Admin\AppInfoController::class)->names([
        'index' => 'admin.app_infos.index',
        'create' => 'admin.app_infos.create',
        'store' => 'admin.app_infos.store',
        'edit' => 'admin.app_infos.edit',
        'update' => 'admin.app_infos.update',
        'destroy' => 'admin.app_infos.destroy',
    ]);

    // Other CRUD Routes will be added here
});

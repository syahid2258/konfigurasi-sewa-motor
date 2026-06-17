<?php

use App\Http\Controllers\Api\AppInfoController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ChatDetailController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\MotorController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PointHistoryController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VoucherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - SewaMotor App
|--------------------------------------------------------------------------
*/

// --- AUTH ---
Route::post('login', [AuthController::class, 'login']);

// --- MOTORS ---
Route::get('motors', [MotorController::class, 'index']);
Route::get('motors/{motor}', [MotorController::class, 'show']);

// --- CATEGORIES ---
Route::get('categories', [CategoryController::class, 'index']);

// --- BOOKINGS ---
Route::get('bookings', [BookingController::class, 'index']);
Route::get('bookings/{booking}', [BookingController::class, 'show']);
Route::post('bookings', [BookingController::class, 'store']);

// --- MESSAGES & CHATS ---
Route::get('messages', [MessageController::class, 'index']);
Route::get('messages/{message}/chats', [ChatDetailController::class, 'index']);
Route::post('messages/{message}/chats', [ChatDetailController::class, 'store']);

// --- NOTIFICATIONS ---
Route::get('notifications', [NotificationController::class, 'index']);

// --- VOUCHERS ---
Route::get('vouchers', [VoucherController::class, 'index']);

// --- POINT HISTORIES ---
Route::get('point-histories', [PointHistoryController::class, 'index']);

// --- FAQS ---
Route::get('faqs', [FaqController::class, 'index']);

// --- APP INFO (Terms & Privacy) ---
Route::get('app-info/{type}', [AppInfoController::class, 'show']);

// --- USER PROFILE ---
Route::get('user', [UserController::class, 'show']);
Route::put('user', [UserController::class, 'update']);
Route::post('user/change-password', [UserController::class, 'changePassword']);

// --- LUCKY SPIN ---
Route::get('lucky-spin/info', [\App\Http\Controllers\LuckySpinController::class, 'info']);
Route::post('lucky-spin/spin', [\App\Http\Controllers\LuckySpinController::class, 'spin']);

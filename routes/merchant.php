<?php

/** Merchant Routes */

use App\Http\Controllers\Merchant\Auth\RegisterController;
use App\Http\Controllers\Merchant\MerchantController;
use App\Http\Controllers\Merchant\ProductController;
use App\Http\Controllers\Merchant\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [MerchantController::class, 'dashboard'])->name('dashboard');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');

Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

Route::resource('product', ProductController::class);

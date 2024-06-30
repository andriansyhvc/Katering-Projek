<?php

/** Customer Routes */

use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');

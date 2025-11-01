<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'registration');
Route::view('/0x55d398326f99059ff775485246999027b31979550x55d398326f99059ff775485246999027b3197955', 'lottery');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::get('/registrations', [RegistrationController::class, 'index'])->name('register.list');


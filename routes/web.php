<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::view('/0x6899d737b08fb3543b2055b4cc2ff557dc7de45b19c92af9794574a6429628350x6899d737b08fb3543b2055b4cc2ff557dc7de45b19c92af9794574a642962835', 'registration');
Route::view('/0x55d398326f99059ff775485246999027b31979550x55d398326f99059ff775485246999027b3197955', 'lottery');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::get('/registrations', [RegistrationController::class, 'index'])->name('register.list');


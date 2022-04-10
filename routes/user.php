<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;


Route::group(['middleware' => 'user'], function () {

    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/profile/details', [UserController::class, 'profile'])->name('user.profile');
});


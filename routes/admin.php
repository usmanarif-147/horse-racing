<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TrackController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RaceController;
use App\Http\Controllers\Admin\HorseController;
use App\Http\Controllers\CalculatorController;





Route::group(['prefix' => '/admin','middleware' => 'admin'], function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    /**
     * track routes
    */
    Route::get('/track-list', [TrackController::class, 'index'])->name('admin.track.list');
    Route::get('/track-list/ajax', [TrackController::class, 'trackListAjax'])->name('admin.track.list.ajax');
    Route::get('/track/{id}', [TrackController::class, 'show'])->name('admin.track.show');
    Route::get('/track/race-list/ajax', [TrackController::class, 'trackRaceListAjax'])->name('admin.track.race.list.ajax');

    /**
     * user routes
     */
    Route::get('/user-list', [UserManagementController::class, 'index'])->name('admin.user.list');
    Route::get('/create/new-user', [UserManagementController::class, 'createUser'])->name('admin.create.user');
    Route::post('/store/new-user', [UserManagementController::class, 'storeUser'])->name('admin.store.user');
    Route::get('/user/{id}', [UserManagementController::class, 'show'])->name('admin.user.show');

    /**
     * race routes
     */
    Route::get('/race-list', [RaceController::class, 'index'])->name('admin.race.list');
    Route::get('/race-list/ajax', [RaceController::class, 'raceListAjax'])->name('admin.race.list.ajax');
    Route::get('/race/{id}', [RaceController::class, 'show'])->name('admin.race.show');
    Route::get('/race/horse-list/ajax', [RaceController::class, 'raceHorseListAjax'])->name('admin.race.horse.list.ajax');

    /**
     * horse routes
     */
    Route::get('/horse-list', [HorseController::class, 'index'])->name('admin.horse.list');
    Route::get('/horse-list/ajax', [HorseController::class, 'horseListAjax'])->name('admin.horse.list.ajax');
    Route::get('/horse/{id}', [HorseController::class, 'show'])->name('admin.horse.show');
    Route::get('/horse/race-list/ajax', [HorseController::class, 'horseRaceListAjax'])->name('admin.horse.race.list.ajax');

});

Route::get('hedging-calculator', [CalculatorController::class, 'hedgingCalculator'])->name('hedging.calculator');
Route::get('betting-calculator', [CalculatorController::class, 'bettingCalculator'])->name('betting.calculator');
Route::get('laybet-calculator', [CalculatorController::class, 'layBetCalculator'])->name('laybet.calculator');


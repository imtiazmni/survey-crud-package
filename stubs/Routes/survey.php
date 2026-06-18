<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SurveyController;

Route::prefix('survey')->group(function () {

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    );

    Route::get(
        '/',
        [SurveyController::class, 'index']
    );

    Route::get(
        '/create',
        [SurveyController::class, 'create']
    );

    Route::post(
        '/',
        [SurveyController::class, 'store']
    );

    Route::get(
        '/{id}/edit',
        [SurveyController::class, 'edit']
    );

    Route::put(
        '/{id}',
        [SurveyController::class, 'update']
    );

    Route::delete(
        '/{id}',
        [SurveyController::class, 'destroy']
    );
});
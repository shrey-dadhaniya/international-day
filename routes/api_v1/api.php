<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// auth
Route::post('auth/login', [\App\Http\Controllers\Api\ApiController::class, 'authenticate']);
Route::post('auth/register', [\App\Http\Controllers\Api\ApiController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('auth/logout', [\App\Http\Controllers\Api\ApiController::class, 'logout']);
    Route::get('auth/get_user', [\App\Http\Controllers\Api\ApiController::class, 'get_user']);
});

// Days
Route::get('days', [\App\Http\Controllers\Api\ApiDayController::class, 'index']);
Route::get('days/{day}', [\App\Http\Controllers\Api\ApiDayController::class, 'show']);
// Categories
Route::get('categories', [\App\Http\Controllers\Api\ApiCategoryController::class, 'index']);
Route::get('categories/{category}', [\App\Http\Controllers\Api\ApiCategoryController::class, 'show']);

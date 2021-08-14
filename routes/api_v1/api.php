<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\api\ApiController;

// auth
Route::post('auth/login', [ApiController::class, 'authenticate']);
Route::post('auth/register', [ApiController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('auth/logout', [ApiController::class, 'logout']);
    Route::get('auth/get_user', [ApiController::class, 'get_user']);
});

// Days
Route::get('days', [\App\Http\Controllers\api\ApiDayController::class, 'index']);
Route::get('days/{day}', [\App\Http\Controllers\api\ApiDayController::class, 'show']);
// Categories
Route::get('categories', [\App\Http\Controllers\api\ApiCategoryController::class, 'index']);
Route::get('categories/{category}', [\App\Http\Controllers\api\ApiCategoryController::class, 'show']);

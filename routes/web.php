<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => 'auth'], function () {
    Route::post('media', [Controllers\MediaController::class, 'upload'])->name('media');
    Route::resource('category', Controllers\CategoryController::class);
    Route::resource('tag', Controllers\TagController::class);
    Route::resource('day', Controllers\DayController::class);
    Route::resource('poster', Controllers\PosterController::class);
});

require __DIR__ . '/auth.php';

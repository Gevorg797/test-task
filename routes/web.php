<?php

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.user.logout');

    //rooms
    Route::middleware(['can:Manage Rooms'])->group(function () {
        Route::resource('rooms', \App\Http\Controllers\RoomController::class);
    });

    //reserve
    Route::middleware(['can:Manage Reserves'])->group(function () {
        Route::get('/reserve/{roomId}', [App\Http\Controllers\ReserveController::class, 'reservePage'])->name('reservePage');
        Route::post('/add-reserve/{roomId}', [App\Http\Controllers\ReserveController::class, 'addReserve'])->name('addReserve');
        Route::resource('reserves', \App\Http\Controllers\ReserveController::class);
    });

});


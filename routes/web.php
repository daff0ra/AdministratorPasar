<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\ManagemenPasarController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('auth');

Route::get('/datas', [DataController::class])->middleware('auth');

Route::resource('ManagemenPasar', ManagemenPasarController::class)->middleware('auth');

Route::get('', [SessionController::class, 'showLogin'])->name('login');
Route::post('', [SessionController::class, 'login']);
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
Route::get('/home', [SessionController::class, 'index'])->name('home')->middleware('auth');

//login admin

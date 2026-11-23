<?php

use App\Http\Controllers\CallbackController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/contacts', 'pages.contacts')->name('contacts');
Route::view('/callback', 'pages.callback')->name('callback.form');

Route::post('/callback', [CallbackController::class, 'store'])
    ->middleware('throttle:5,1,callback')
    ->name('callback.store');

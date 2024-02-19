<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListumController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('lista', ListumController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\ListumController::class, 'index'])->name('home');

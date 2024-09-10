<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'showAllUser')->name('home');
    Route::get('/delete/{id}', 'deleteUser')->name('delete.user');
    Route::get('/user/{id?}', 'addOrUpdateUser')->name('saveUser');
    Route::post('/save/{id?}', 'saveUser')->name('save.user');
});

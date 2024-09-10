<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(StudentController::class)->group(function () {
    Route::get('/', 'showAllUser')->name('home');
    Route::get('/delete/{id}', 'deleteUser')->name('delete.user');
    Route::get('/saveUser/{id?}', 'addOrUpdateUser')->name('saveUser');
    Route::post('/save/{id?}', 'saveUser')->name('save.user');
});

Route::resource('users', UserController::class);

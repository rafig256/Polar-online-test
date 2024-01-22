<?php

use \Illuminate\Support\Facades\Route;


Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/','\App\Http\Controllers\Admin\index@index')->name('adminDashboard');
    Route::resource('exam','App\Http\Controllers\Admin\Exam\ExamController');
    Route::resource('pole','App\Http\Controllers\Admin\Pole\PoleController')->except(['show']);
    Route::resource('/question','\App\Http\Controllers\Admin\Question\questionController');
});

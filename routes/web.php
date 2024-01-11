<?php

use App\Livewire\Exam\Exam;
use App\Livewire\Index\Index;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Index::class)->name('home');
Route::get('/exam/{id}',Exam::class)->name('examPage');
Route::get('/register',\App\Livewire\Auth\Register::class)->name('register')->middleware('guest');
Route::get('/login',\App\Livewire\Auth\Login::class)->name('login')->middleware('guest');
Route::get('/logout',function (){
    Auth::logout(); return to_route('home');
})->name('logout');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/','\App\Http\Controllers\Admin\index@index')->name('adminDashboard');
    Route::resource('exam','App\Http\Controllers\Admin\Exam\ExamController');
    Route::resource('pole','App\Http\Controllers\Admin\Pole\PoleController')->except(['show']);
});


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
Route::get('/run_exam/{id}',\App\Livewire\Exam\RunExam::class)->middleware('auth')->name("runExam");
Route::get('/workbook/{answer}',\App\Livewire\Exam\Workbook::class)->name("workbook");
Route::get('/register',\App\Livewire\Auth\Register::class)->name('register')->middleware('guest');
Route::get('/login',\App\Livewire\Auth\Login::class)->name('login')->middleware('guest');
Route::get('/logout',function (){
    Auth::logout(); return to_route('home');
})->name('logout');




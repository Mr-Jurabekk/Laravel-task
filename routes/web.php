<?php

use App\Http\Controllers\AnswerApplicationController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=> 'auth'], function(){

Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');

Route::resource('applications', ApplicationsController::class);

Route::get('applications/{applications}/answer', [AnswerApplicationController::class, 'create'])->name('answer.create');
Route::post('applications/{applications}/answer', [AnswerApplicationController::class, 'store'])->name('answer.store');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';

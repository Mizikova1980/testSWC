<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::post('/event/create', [EventController::class, 'store'])->name('event.store');
Route::post('/event/addParticipant', [EventController::class, 'addParticipant'])->name('event.addParticipant');
Route::get('/event/{event}', [EventController::class, 'show'])->name('event.show');
Route::delete('event/delete', [EventController::class, 'destroy'])->name('event.delete');
Route::delete('event/deleteParticipant', [EventController::class, 'destroyParticipant'])->name('event.deleteParticipant');

Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');





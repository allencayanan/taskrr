<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SubTaskController;
use App\Http\Controllers\TaskController;
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

Route::redirect('/', 'tasks');

Route::controller(LoginController::class)->name('login.')->group(function () {
    Route::get('login', 'index')->name('index');
    Route::post('login', 'authenticate')->name('authenticate');
    Route::post('logout', 'logout')->name('logout');
});

Route::controller(RegisterController::class)->name('register.')->group(function () {
    Route::get('register', 'index')->name('index');
    Route::post('register', 'store')->name('store');
});

Route::middleware('auth:web')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::resource('subtasks', SubTaskController::class);
});

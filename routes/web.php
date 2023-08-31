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
    Route::prefix('tasks')->group(function () {
        Route::controller(TaskController::class)
            ->name('tasks.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::get('{task}', 'show')->name('show')->withTrashed();
                Route::post('/', 'store')->name('store');
                Route::get('{task}/edit', 'edit')->name('edit');
                Route::put('{task}', 'update')->name('update');
                Route::delete('{task}', 'destroy')->name('destroy')->withTrashed();
            });

        Route::controller(SubTaskController::class)
            ->name('subtasks.')
            ->prefix('{task}/subtasks')
            ->group(function () {
                Route::get('create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('{subTask}/edit', 'edit')->name('edit');
                Route::put('{subTask}', 'update')->name('update');
                Route::delete('{subTask}', 'destroy')->name('destroy');
            });
    });

});

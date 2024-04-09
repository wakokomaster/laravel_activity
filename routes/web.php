<?php

use App\Http\Controllers\GenderController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    // NOTE: ->name() is some magical shiiiieet (I don't like it)
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginAuth']);
});


Route::group(['middleware' => 'auth'], function () {
    Route::controller(GenderController::class)->group(function () {
        Route::get('/gender/create', 'create');
        Route::get('/gender/show/{id}', 'show');
        Route::get('/gender', 'index');
        Route::get('/gender/edit/{id}', 'edit');
        Route::get('/gender/delete/{id}', 'delete');

        Route::post('/gender/store', 'store');
        Route::put('/gender/update/{gender}', 'update');
        Route::delete('/gender/destroy/{gender}', 'destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/home', 'index');
        Route::get('/user', 'index');
        Route::get('/user/create', 'create');
        Route::get('/user/show/{id}', 'show');
        Route::get('/user/edit/{id}', 'edit');
        Route::get('/user/delete/{id}', 'delete');

        Route::get('/logout', [UserController::class, 'logout']);

        Route::post('/user/store', 'store');
        Route::put('/user/update/{user}', 'update');
        Route::delete('/user/destroy/{user}', 'destroy');
    });
});

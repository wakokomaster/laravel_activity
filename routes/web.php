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
    Route::get('/user/create','create');
    
});

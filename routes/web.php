<?php

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

Route::get('/user', function () {
    return view('user.index');
});

Route::get('/add', function () {
    return view('user.create');
});

Route::get('/edit', function () {
    return view('user.edit');
});

Route::get('/delete', function () {
    return view('user.delete');
});

Route::get('/gender/index', function () {
    return view('gender.index');
});

Route::get('/gender/add', function () {
    return view('gender.create');
});

Route::get('/gender/edit', function () {
    return view('gender.edit');
});

Route::get('/gender/delete', function () {
    return view('gender.delete');
});





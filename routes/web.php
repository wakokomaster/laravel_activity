<?php

use App\Http\Controllers\GenderController;
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

Route::get('/gender/create', [GenderController::class,'create']);
Route::get('/gender/show/{id}', [GenderController::class,'show']);
Route::get('/gender', [GenderController::class,'index']);
Route::get('/gender/edit/{id}', [GenderController::class,'edit']);

Route::post('/gender/store', [GenderController::class,'store']);
Route::put('/gender/update/{gender}', [GenderController::class,'update']);





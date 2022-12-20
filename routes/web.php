<?php

use App\Http\Controllers\Web\UserController;
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

Route::get('/', function () {
    return view('welcome');
});


//MEMEBERS ROUTES

Route::get('/members', [UserController::class, 'index']);
Route::get('/members/edit/{id}', [UserController::class, 'show']);
Route::get('/members/create', [UserController::class, 'create']);
Route::post('/members/create', [UserController::class, 'store']);
Route::get('/members/card/update/{id}', [UserController::class, 'assign']);
Route::get('/members/delete/{id}', [UserController::class, 'destroy'] );
Route::get('/members/disable/{id}', [UserController::class, 'disable'] );
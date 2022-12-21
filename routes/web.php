<?php

use App\Http\Controllers\Web\PledgeController;
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
    return view('dashboard');
});


//MEMEBERS ROUTES

Route::get('/members', [UserController::class, 'index']);
Route::get('/members/edit/{id}', [UserController::class, 'show']);
Route::post('/members/upload', [UserController::class, 'uploadusers']);
Route::post('/members/update/{id}', [UserController::class, 'update']);
Route::get('/members/create', [UserController::class, 'create']);
Route::post('/members/create', [UserController::class, 'store']);
Route::get('/members/card/update/{id}', [UserController::class, 'assign']);
Route::get('/members/delete/{id}', [UserController::class, 'destroy'] );
Route::get('/members/disable/{id}', [UserController::class, 'disable'] );
Route::get('/members/search', [UserController::class,'selectSearch']);



//PLEDGE ROUTES

Route::get('/pledges', [PledgeController::class, 'index']);
Route::get('/pledges/delete/{id}', [PledgeController::class, 'destroy'] );
Route::get('/pledges/create', [PledgeController::class, 'create']);
Route::post('/pledges/create', [PledgeController::class, 'store']);
Route::get('/pledges/edit/{id}', [PledgeController::class, 'show']);
Route::post('/pledges/update/{id}', [PledgeController::class, 'update']);
Route::post('/pledges/purpose/create', [PledgeController::class, 'createPurpose']);
Route::post('/purposes/delete/{id}', [PledgeController::class, 'deletePurpose']);



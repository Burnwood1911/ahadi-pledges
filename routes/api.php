<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PledgeController;
use App\Http\Controllers\Api\JumuiyaController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\PledgeTypeController;
use App\Http\Controllers\Api\PaymentMethodController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//USER ROUTES
Route::post('/user', [UserController::class, 'store']);



//JUMUIYA ROUTES

Route::get('/jumuiya', [JumuiyaController::class, 'index']);
Route::get('/jumuiya/{id}', [JumuiyaController::class, 'show']);
Route::post('/jumuiya', [JumuiyaController::class, 'store']);
Route::patch('/jumuiya/{id}', [JumuiyaController::class, 'update']);
Route::delete('/jumuiya/{id}', [JumuiyaController::class, 'destroy']);

//ROLE ROUTES
Route::get('/role', [RoleController::class, 'index']);
Route::get('/role/{id}', [JumuiyaCRoleControllerontroller::class, 'show']);
Route::post('/role', [RoleController::class, 'store']);
Route::patch('/role/{id}', [RoleController::class, 'update']);
Route::delete('/role/{id}', [RoleController::class, 'destroy']);

//PLEDGE ROUTES
Route::get('/pledge', [PledgeController::class, 'index']);
Route::get('/pledge/user/{id}', [PledgeController::class, 'users']);
Route::get('/pledge/{id}', [PledgeController::class, 'show']);
Route::post('/pledge/{id}', [PledgeController::class, 'store']);
Route::patch('/pledge/{id}', [PledgeController::class, 'update']);
Route::delete('/pledge/{id}', [PledgeController::class, 'destroy']);

//PLEDGETYPE ROUTES

Route::get('/pledgetype', [PledgeTypeController::class, 'index']);
Route::get('/pledgetype/{id}', [PledgeTypeController::class, 'show']);
Route::post('/pledgetype', [PledgeTypeController::class, 'store']);
Route::patch('/pledgetype/{id}', [PledgeTypeController::class, 'update']);
Route::delete('/pledgetype/{id}', [PledgeTypeController::class, 'destroy']);

//PAYMENT METHODS ROUTES
Route::get('/paymentmethod', [PaymentMethodController::class, 'index']);
Route::get('/paymentmethod/{id}', [PaymentMethodController::class, 'show']);
Route::post('/paymentmethod', [PaymentMethodController::class, 'store']);
Route::patch('/paymentmethod/{id}', [PaymentMethodController::class, 'update']);
Route::delete('/paymentmethod/{id}', [PaymentMethodController::class, 'destroy']);

//PAYMENT ROUTES
Route::get('/payment', [PaymentController::class, 'index']);
Route::get('/payment/user/{id}', [PaymentController::class, 'users']);
Route::get('/payment/pledge/{id}', [PaymentController::class, 'pledge']);
Route::get('/payment/{id}', [PaymentController::class, 'show']);
Route::post('/payment', [PaymentController::class, 'store']);

//CARD ROUTES

Route::get('/card', [JumuiyaController::class, 'index']);
Route::get('/card/{id}', [JumuiyaController::class, 'show']);
Route::post('/card', [JumuiyaController::class, 'store']);
Route::patch('/card/{id}', [JumuiyaController::class, 'update']);
Route::delete('/card/{id}', [JumuiyaController::class, 'destroy']);





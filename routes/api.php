<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\CustomerController;
use App\Http\Controllers\api\v1\InvoicesController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1', 'namespace'=>'App\Http\Controllers\api\v1'], function(){
    Route::apiResource('customer', CustomerController::class);
    Route::apiResource('invoices', InvoicesController::class);
    Route::post('customer/bulk', [CustomerController::class, 'bulkStore']);
});
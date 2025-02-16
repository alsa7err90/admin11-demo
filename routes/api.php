<?php

use App\Http\Controllers\Api\TesstCovtrollerApiController;

use App\Http\Controllers\Api\LanguageControllerApiController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BaseDataController;
use App\Http\Controllers\Api\TicketController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
// routes/api.php
Route::get('home', function (Request $request) {
    return "home";
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('/base-data', [BaseDataController::class, 'index']);

Route::apiResource('languages', LanguageControllerApiController::class);
Route::prefix('tickets')->middleware(['auth:sanctum' ])->group(function () {
    Route::get('/', [TicketController::class, 'index']);
    Route::post('/', [TicketController::class, 'store']);
    Route::get('/{id}', [TicketController::class, 'show']);
    Route::post('/{id}/comments', [TicketController::class, 'addComment']);
});

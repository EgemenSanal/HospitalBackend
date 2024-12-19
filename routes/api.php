<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\EmergencyResponseController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(MemberController::class)->group(function () {
    Route::get('/user', 'index')->middleware('auth:api');
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('logout', 'logout')->middleware('auth:api');
    Route::delete('user/{member}', 'destroy')->middleware('auth:api');
    Route::put('user/{member}', 'update')->middleware('auth:api');

});
Route::controller(FeedbackController::class)->group(function () {
    Route::get('/feedbacks', 'index')->middleware('auth:api');
    Route::delete('/feedbacks/{feedback}', 'destroy')->middleware('auth:api');
});
Route::controller(EmergencyResponseController::class)->group(function () {
   Route::get('/emergency-responses', 'index')->middleware('auth:api');
    Route::put('/emergency-responses/{emergencyResponse}', 'update')->middleware('auth:api');

});

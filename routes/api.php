<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', [App\Http\Controllers\SignUpController::class, 'displayUsers']);
Route::get('/view/users/{user}', [App\Http\Controllers\SignUpController::class, 'viewUser']);

Route::post('/storeUsers', [App\Http\Controllers\SignUpController::class, 'signUpUsers']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

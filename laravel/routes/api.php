<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\QuestionController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::get('users/{id}/edit', [UserController::class, 'edit']);
Route::put('users/{id}/edit', [UserController::class, 'update']);
Route::delete('users/{id}/delete', [UserController::class, 'destroy']);

Route::get('questions', [QuestionController::class, 'index']);
Route::post('questions', [QuestionController::class, 'store']);
Route::get('questions/{id}', [QuestionController::class, 'show']);
Route::get('questions/{id}/edit', [QuestionController::class, 'edit']);
Route::put('questions/{id}/edit', [QuestionController::class, 'update']);
Route::delete('questions/{id}/delete', [QuestionController::class, 'destroy']);
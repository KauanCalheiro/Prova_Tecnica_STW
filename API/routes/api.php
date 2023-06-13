<?php

use App\Http\Controllers\Api\IngredientController;
use App\Http\Controllers\Api\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/recipe', [ RecipeController::class, 'index']);
Route::get('/recipe/{id}', [RecipeController::class, 'show']);
Route::post('/recipe', [RecipeController::class, 'store']);
Route::put('/recipe/{id}', [RecipeController::class, 'update']);
Route::delete('/recipe/{id}', [RecipeController::class, 'destroy']);

Route::get('/ingredient', [IngredientController::class, 'index']);
Route::post('/ingredient', [IngredientController::class, 'store']);
Route::put('/ingredient/{id}', [IngredientController::class, 'update']);
Route::delete('/ingredient/{id}', [IngredientController::class, 'destroy']);



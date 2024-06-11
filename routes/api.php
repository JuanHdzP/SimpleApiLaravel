<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/categorias', [CategoriaController::class, 'getAll']);
Route::get('/categoria/{id}', [CategoriaController::class, 'getById']);
Route::post('/addCategoria', [CategoriaController::class, 'create']);
Route::put('/updateCategoria/{id}', [CategoriaController::class, 'update']);
Route::delete('/deleteCategoria/{id}', [CategoriaController::class, 'delete']);

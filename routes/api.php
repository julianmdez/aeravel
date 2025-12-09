<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioFormController;

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

Route::get('/test', function (Request $request) {
    return response()->json(['message' => 'FUNCIONA']);
});


// Agrupamos bajo el middleware que verifica el token
Route::middleware('api.key')->group(function () {
    Route::get('/getVuelos', [VuelosController::class, 'getVuelos']);
    
    // Nombres RESTful estándar: POST a /usuarios-formulario o similar
    Route::post('/usuarioFormulario', [UsuarioFormController::class, 'store']);
});
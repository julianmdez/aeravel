<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\UsuarioFormulario;

class UsuarioFormController extends Controller
{
    public function store(StoreUsuarioRequest $request): JsonResponse
    {
        // Si llega acá, YA está validado (incluyendo duplicados).
        // El validated() devuelve solo los campos aprobados.
        $usuarioFormulario = UsuarioFormulario::create($request->validated());

        return response()->json([
            'message' => 'Solicitud recibida correctamente',
            'data'    => $usuarioFormulario,
        ], Response::HTTP_CREATED);
    }
}

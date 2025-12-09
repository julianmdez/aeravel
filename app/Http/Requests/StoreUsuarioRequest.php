<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // La seguridad la maneja el middleware de la ruta
    }

    public function rules(): array
    {
        // AQUI está la magia:
        // 'unique:usuario_formularios,email' revisa si ya existe en la tabla.
        return [
            'nombre'  => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'empresa' => 'required|string|max:255',
        ];
    }

    // Opcional: Personalizar mensajes
    public function messages(): array
    {
        return [
            'email.email'  => 'El formato del correo no es válido.',
            'required'     => 'El campo :attribute es obligatorio.'
        ];
    }

    // IMPORTANTE: Para que devuelva JSON automáticamente cuando falla
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Error de validación',
            'errors'  => $validator->errors()
        ], 422));
    }
}
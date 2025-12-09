<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioFormulario extends Model
{
    protected $table = 'UsuariosFormulario';
    protected $primaryKey = 'IdForm';
    public $timestamps = false;

    protected $fillable = ['Nombre', 'Email', 'Empresa', 'FechaRegistro'];
}

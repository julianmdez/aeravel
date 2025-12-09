<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VuelosController extends Controller
{
    public function getVuelos()
    {
        $sql = DB::select('SELECT * FROM "ListarVuelosDisponibles"()');
        return response()->json($sql);
    }
}

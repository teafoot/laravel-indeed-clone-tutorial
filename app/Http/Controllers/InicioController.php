<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Ubicacion;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $vacantes = Vacante::latest()->where('activa', true)->take(10)->get();
        $ubicaciones = Ubicacion::all();
        // $categories - viene del service provider (menu y search box)

        return view('inicio.index', compact('vacantes', 'ubicaciones'));
    }
}

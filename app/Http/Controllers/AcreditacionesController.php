<?php

namespace App\Http\Controllers;

use App\Model\NominaModel;
use Illuminate\Http\Request;

class AcreditacionesController extends Controller
{
    function index()
    {
        return view('acreditaciones/index');
    }

    function estado(Request $Request)
    {

        $nomina = NominaModel::where('documento', $Request->input('votante'))->first();

        if ($nomina !== null) {
            if ($nomina->presente === 'N') {
                $nomina->presente = 'S';
                $nomina->update();
                $color = ' alert-success';
                $mensaje =  'Se Dio Presente';
            } else {
                $nomina->presente = 'N';
                $nomina->update();
                $color = ' alert-danger';
                $mensaje =  'Se Dio Ausente';
            }
            $mensaje = $mensaje . ' al participante ' . ' - ' . $nomina->nombre;
        } else {
            $color = ' alert-danger';
            $mensaje =  'DOCUMENTO INVALIDO';
        }

        return view('acreditaciones/index', compact('mensaje', 'color'));
    }
}

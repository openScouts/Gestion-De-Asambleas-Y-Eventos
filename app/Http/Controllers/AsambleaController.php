<?php

namespace App\Http\Controllers;

use App\Model\AsambleaLogModel;
use App\Model\AsambleaModel;
use App\Model\NominaModel;
use Illuminate\Http\Request;

class AsambleaController extends Controller
{
    function index()
    {
        return view('asamblea/index');
    }

    function estado(Request $Request)
    {

        $nomina = NominaModel::where('presente', 'S')->find($Request->input('votante'));

        if ($nomina !== null) {
            if ($nomina->asamblea === 'N') {
                $nomina->asamblea = 'S';
                $nomina->update();
                $color = ' alert-success';
                $mensaje =  'Se Dio Presente';
            } else {
                $nomina->asamblea = 'N';
                $nomina->update();
                $color = ' alert-danger';
                $mensaje =  'Se Dio Ausente';
            }
            $mensaje = $mensaje . ' al participante ' . ' - ' . $nomina->nombre;
        } else {
            $color = ' alert-danger';
            $mensaje =  'Nro de Votante INVALIDO';
        }

        return view('asamblea/index', compact('mensaje', 'color'));
    }


    function historico($nomina_id)
    {
        $logs = AsambleaLogModel::where('nomina_id', $nomina_id)->get();

        return view('asamblea/historico', compact('logs'));
    }

    function listado()
    {
        if (\Request::has('filtrar')) {
            $nomina = NominaModel::where('organismo', \Request::get('filtrar'))->where('asamblea', 'S')->get();
        } elseif (\Request::has('ausente')) {
            $nomina = NominaModel::where('presente', 'S')->where('asamblea',  \Request::get('ausente'))->get();
        } else {
            $nomina = NominaModel::where('presente', 'S')->get();
        }


        return view('asamblea/listado', compact('nomina'));
    }
}

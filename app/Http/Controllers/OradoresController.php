<?php

namespace App\Http\Controllers;

use App\Model\NominaModel;
use App\Model\OradoresModel;
use Illuminate\Http\Request;

class OradoresController extends Controller
{
    function index()
    {
        $oradores = OradoresModel::all();
        return view('oradores/index', compact('oradores'));
    }
    function alta(Request $Request)
    {
        $mensaje = null;
        if (NominaModel::where('asamblea', 'S')->where('id', $Request->input('votante'))->count()) {
            try {
                $orador = new OradoresModel();
                $orador->nomina_id = $Request->input('votante');
                $orador->save();
            } catch (\Throwable $th) { }
        } else {
            $mensaje = 'La persona no esta Presente';
        }



        return redirect('/asamblea/oradores')->with('mensaje', $mensaje);
    }
    function baja($id)
    {
        OradoresModel::find($id)->delete();

        return redirect('/asamblea/oradores');
    }
}

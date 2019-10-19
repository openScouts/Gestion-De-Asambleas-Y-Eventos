<?php

namespace App\Http\Controllers;

use App\Model\NominaModel;
use App\Model\OradoresModel;

class InicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalNomina  = NominaModel::all()->count();
        $quorum = NominaModel::where('presente','S')->count();
        $salaPresente = NominaModel::where('asamblea','S')->count();
        $salaAusentes = NominaModel::where('asamblea','N')->count();
        $oradores = OradoresModel::all();
        return view('inicio',compact('totalNomina','quorum','salaPresente','salaAusentes','oradores'));

    }
}

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
        // Padron Asambleario
        $totalPadron  = NominaModel::all()->count();
        // Acreditados
        $acreditados = NominaModel::where('presente','S')->count();
        // quorum
        $quorum = NominaModel::where('presente','S')->where('asamblea','S')->count();
        // Acreditado Ausente
        $acreditadosAusentes = NominaModel::where('presente','S')->where('asamblea','N')->count();
        $oradores = OradoresModel::all();
        return view('inicio',compact('totalPadron','acreditados','quorum','acreditadosAusentes','oradores'));
    }
}

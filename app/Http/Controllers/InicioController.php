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

        $quorum = NominaModel::where('presente','S')->where('categoria','Beneficiario')->count();
        $beneficiarosPresentes = NominaModel::where('presente','S')->where('asamblea','N')->where('categoria','Beneficiario')->count();
        $adultosPesentes = NominaModel::where('presente','S')->where('categoria','!=','Beneficiario')->count();
        $oradores = OradoresModel::all();

        return view('inicio',compact('quorum','beneficiarosPresentes','adultosPesentes','oradores'));

    }
}

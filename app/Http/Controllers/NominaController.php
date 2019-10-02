<?php

namespace App\Http\Controllers;

use App\Model\NominaLogModel;
use App\Model\NominaModel;
use Illuminate\Http\Request;
use PDF; // at the top of the file

class NominaController extends Controller
{
    function index()
    {
        if(\Request::has('filtrar')){
            $nomina = NominaModel::where('organismo',\Request::get('filtrar'))->get();
        }else{
            $nomina = NominaModel::all();
        }


        return view('nomina/index', compact('nomina'));
    }

    function organismos()
    {
        $query = "  select
                        organismo,
                        sum(case when presente = 'S' THEN 1 ELSE 0 END) as presentes,
                        sum(case when presente = 'N' THEN 1 ELSE 0 END) as ausentes,
                        count(1) as total
                    from nomina
                    GROUP by organismo
                    order by 1 asc";

        $dataSet = \DB::select($query);
        return view('nomina/organismos', compact('dataSet'));
    }


    function historico($nomina_id)
    {
        $logs = NominaLogModel::where('nomina_id',$nomina_id)->get();

        return view('nomina/historico', compact('logs'));
    }



    function generaPDF($organismo)
    {
        // listado de grupos y detalle
        $nomina = NominaModel::where('organismo', $organismo)->get();
        $titulo = 'Nomina Organismo :' . $organismo;


        PDF::SetTitle($titulo);
        PDF::SetFont('helvetica', '', 10);
        PDF::AddPage();

        PDF::SetFillColor(224, 235, 255);
        PDF::SetTextColor(0);
        PDF::SetFont('');

        $style = array(
            'position' => '5',
            'align' => 'C',
            'stretch' => false,
            'fitwidth' => true,
            'cellfitalign' => '',
            'hpadding' => 'auto',
            'vpadding' => 'auto'

        );
        $h_color = 10;

        //$contador = 1;
        foreach ($nomina->chunk(20) as $chunk) {
            PDF::Cell(30, 7, 'Pagina :' . PDF::getAliasNumPage());
            PDF::Ln();
            PDF::Cell(30, 7, $titulo);
            PDF::Ln();
            PDF::Ln();
            foreach ($chunk as $row) {
                PDF::Cell(10, $h_color, $row->id, 'LTRB');
                PDF::Cell(18, $h_color, $row->documento, 'LTRB');
                PDF::Cell(50, $h_color, substr($row->funcion, 0, 25), 'LTRB');
                PDF::Cell(60, $h_color, substr($row->nombre, 0, 31), 'LTRB');
                PDF::Cell(22, $h_color, $row->categoria, 'LTRB');
                PDF::Cell(35, $h_color, PDF::write1DBarcode($row->documento, 'C39', '', '', 35, 8, 5, $style), 'LTRB');
                PDF::Ln();
                //$contador++;
            }
            PDF::Write(0, "\n\n");
            PDF::Write(0, "Firma y Aclaracion del Responsable: ______________________________________");
            PDF::Write(0, "\n\n");
            PDF::Write(0, "Numero de Celular : ______________________________________");
            PDF::AddPage();
        }

        PDF::Output($titulo . '.pdf', 'D');
    }
}

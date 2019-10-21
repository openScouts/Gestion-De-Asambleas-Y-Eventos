<?php


// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');

// create new PDF document
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Andres Lacquaniti');
$pdf->SetTitle('Numeros para Asamblea');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);



$pdf->AddPage();

// define barcode style
$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);

foreach (range(1, 450) as $numero) {
	$numero_print = str_pad($numero, 3, '0', STR_PAD_LEFT); // Formateo el numero con Ceros ADELANTE
	$pdf->SetFont('dejavusans', '', 230, '', true);
	$pdf->Cell(0, 0, $numero_print, 0, 1,'C');
	$pdf->SetFont('dejavusans', '', 25, '', true);
	$pdf->Cell(0,0 , $pdf->write1DBarcode($numero_print, 'C39', 75, '', '', 20, 0.5, $style), 0, 1,'C');
	// Verifico si el numero es par, si es par, agrego una nueva pagina
	if ($numero%2==0){
		$pdf->AddPage();
	}
}


$pdf->Output('example_001.pdf', 'I');


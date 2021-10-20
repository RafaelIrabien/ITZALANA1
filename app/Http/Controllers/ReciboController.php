<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class ReciboController extends Controller
{
	public function pdf(){

		//Obtener el listado de las ventas
		


		//Instanciar página
		
		$pdf=new Fpdf('P','mm','A4');


		//Agregano una página
		$pdf->Addpage();

		//Estableciendo una fuente
		$pdf->SetFont('Arial', '', 25);

		//Cuerpo del reporte
		$pdf->Ln(3);
		$pdf->Cell(188,6, 'FARMACIA ITZALANA', '', 1, 'C');

		$pdf->Ln(5);

		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(188,6, 'COMPROBANTE DE COMPRA', 'B', 1, 'C' );

		$pdf->Ln(10);

		$pdf->Cell(188,6, 'FARMACIA Y PAPELERIA ITZALANA', '', 1, 'L');
		$pdf->Cell(188,6, 'CALLE 31 X 34, Col. CENTRO', '', 1, 'L');
		$pdf->Cell(188,6, 'C.P 97540 IZAMAL, YUCATAN, MEXICO', '', 1, 'L');
		$pdf->Cell(188,6, 'TEL: 988 954 0032', '', 1, 'L');



		//Cierre del recibo
		$pdf->Output('I', 'Recibo de compra.pdf');
		exit;

	}

}
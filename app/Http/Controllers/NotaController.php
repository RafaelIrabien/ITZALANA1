<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

use App\Producto;

class NotaController extends Controller
{
	public function pdf(){

		//Obtener el listado de las ventas
		$productos = Producto::all();
		//return $productos;

		//Instanciar página
		
		$pdf=new Fpdf('P','mm','A4');

		//Agregano una página
		$pdf->Addpage();

		//Estableciendo una fuente
		$pdf->SetFont('Arial', '', 18);

		//Cuerpo del reporte
		$pdf->Ln(3);
		$pdf->Cell(188,6, 'NOTA DE COMPRA', 'B', 1, 'C');
		$pdf->Ln(10);

		$pdf->SetFont('Courier', '', 12);

			//Celda de margen
			$pdf->Cell(2,5,'',0,0);

		$pdf->Cell(10,5, 'SKU', 1,0,'C');
		$pdf->Cell(50,5, 'Nombre', 1,0,'C');
		$pdf->Cell(80,5, 'Descripción',1,0,'C');
		$pdf->Cell(25,5, 'Cantidad',1,0,'C');
		$pdf->Cell(20,5, 'Precio',1,0,'C');

		$pdf->Ln(5);
		//Tabla de datos
		$alt=10;

		foreach ($productos as $producto) {
			$pdf->Cell(2,5, '', 0,0);

			//Imprimo el sku del producto
			$pdf->Cell(10,$alt, $producto->sku,1,0,'C');

			//Imprimo el nombre del producto
			$pdf->Cell(100,$alt, utf8_decode($producto->nombre),1,0,'C');

			//Imprimo la descripción del producto
			$pdf->Cell(30,$alt, utf8_decode($producto->descripcion),1,0,'C');

			//Imprimo la cantidad del producto
			$pdf->Cell(25,$alt, $producto->cantidad,1,0,'C');

			//Imprimo el precio del producto
			$pdf->Cell(20,$alt, $producto->precio_venta,1,1,'C');
		}

		//Cierre de la nota
		$pdf->Output('I', 'Nota de compra.pdf');
		exit;
	}


}
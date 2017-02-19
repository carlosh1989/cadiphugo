<?php
require __DIR__ . '/vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
extract($_GET);
$mpdf = new mPDF('','Letter',12,'arial');
ob_start();
include('encabezado.php');
$mpdf->SetHTMLHeader(ob_get_clean());
$mpdf->setFooter('{PAGENO}');
$mpdf->AddPage('', // L - landscape, P - portrait 
'', '', '', '',
5, // margen izquierdo
5, // margen derecho
30, // margin arriba
2.5, // margin abajo
0, // margin encabezado
0); // margin pie de pagina

ob_start();
include("jefe.php");
$mpdf->WriteHTML(ob_get_clean());
$nombre = "Jefes.pdf";
$mpdf->Output($nombre,'D');

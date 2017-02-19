<?php
require __DIR__ . '/vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

extract($_GET);
$page_html = file_get_contents("http://localhost/cadiphugo/jefe.php?municipio=".$municipio."&parroquia=".$parroquia."&bodega=".$bodega."");

$mpdf = new mPDF('','Letter',12,'arial');
$mpdf->SetHTMLHeader('
	<img  src="assets/img/cadip-cintillo.jpg" height="50" width="100%"><br>
	<img width="140" src="assets/img/cadip-logo.png">
');
$mpdf->setFooter('{PAGENO}');
$mpdf->AddPage('', // L - landscape, P - portrait 
'', '', '', '',
5, // margin_left
5, // margin right
30, // margin top
2.5, // margin bottom
0, // margin header
0); // margin footer

$nombre = "Jefes.pdf";
$mpdf->WriteHTML($page_html);
$mpdf->Output($nombre,'D');
/*$nombre = "jefesycargafamilia.pdf";
$dompdf = new Dompdf();
$dompdf->loadHtml($output);
$dompdf->setPaper('A3');
$dompdf->render();
$dompdf->stream($nombre); 
*///krumo::dump($output);
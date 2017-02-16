<?php
require __DIR__ . '/vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
use zz\Html\HTMLMinify;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

extract($_GET);
$page_html = file_get_contents("http://localhost/cadiphugo/jefecarga.php?municipio=".$municipio."&parroquia=".$parroquia."&bodega=".$bodega."");

$nombre = "jefesycargafamilia.pdf";
$mpdf = new mPDF();
$mpdf->SetHTMLHeader('<img src="assets/img/banner.jpg">');
$mpdf->SetHTMLFooter('<img src="assets/img/banner.jpg">');

$mpdf->AddPage('', // L - landscape, P - portrait 
'', '', '', '',
5, // margin_left
5, // margin right
60, // margin top
30, // margin bottom
0, // margin header
0); // margin footer

$nombre = "jefesycargafamilia.pdf";
$mpdf->WriteHTML($page_html);
$mpdf->Output($nombre,'D');
/*$nombre = "jefesycargafamilia.pdf";
$dompdf = new Dompdf();
$dompdf->loadHtml($output);
$dompdf->setPaper('A3');
$dompdf->render();
$dompdf->stream($nombre); 
*///krumo::dump($output);
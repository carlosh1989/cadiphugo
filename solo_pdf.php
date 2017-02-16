<?php
require __DIR__ . '/vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
extract($_GET);
$page_html = file_get_contents("http://localhost/cadiphugo/solo.php?municipio=".$municipio."&parroquia=".$parroquia."&bodega=".$bodega."");

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

$nombre = "jefes.pdf";
$mpdf->WriteHTML($page_html);
$mpdf->Output($nombre,'D');
/*$dompdf = new Dompdf();
$dompdf->loadHtml($page_html);
$dompdf->setPaper('A4');
$dompdf->render();
$dompdf->stream();*/
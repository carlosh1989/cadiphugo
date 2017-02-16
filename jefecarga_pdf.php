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
$mpdf = new mPDF('','letter');;

$mpdf->SetHTMLHeader('<img src="http://www.comocreartuweb.com/imagenes/513-cabecera.gif">');

$mpdf->SetHTMLFooter('

<table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;"><tr>

<td width="33%"><span style="font-weight: bold; font-style: italic;">{DATE j-m-Y}</span></td>

<td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>

<td width="33%" style="text-align: right; ">My document</td>

</tr></table>

');
$mpdf->WriteHTML($page_html);
$mpdf->Output($nombre, 'D');
/*$nombre = "jefesycargafamilia.pdf";
$dompdf = new Dompdf();
$dompdf->loadHtml($output);
$dompdf->setPaper('A3');
$dompdf->render();
$dompdf->stream($nombre); 
*///krumo::dump($output);
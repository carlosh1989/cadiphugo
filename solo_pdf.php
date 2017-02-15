<?php
require __DIR__ . '/vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
extract($_GET);
$page_html = file_get_contents("http://localhost/cadiphugo/solo.php?municipio=".$municipio."&parroquia=".$parroquia."&bodega=".$bodega."");
$dompdf = new Dompdf();
$dompdf->loadHtml($page_html);
$dompdf->setPaper('A4');
$dompdf->render();
$dompdf->stream();
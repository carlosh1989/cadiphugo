<?php
require 'vendor/autoload.php';
use zz\Html\HTMLMinify;
use Dompdf\Dompdf;

$pagina = file_get_contents('http://localhost/cadiphugo/jefecarga.php?municipio=5&parroquia=19&bodega=97');

$minify = HTMLMinify::minify($pagina);


extract($_GET);
$dompdf = new Dompdf();
$dompdf->loadHtml($pagina);
$dompdf->setPaper('A4');
$dompdf->render();
$dompdf->stream();

ob_start();
//be sure this file exists, and works outside of web context etc.)
require("admin/store/orders/45/invoice/print");
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
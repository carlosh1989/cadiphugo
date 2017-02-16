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

$minify = HTMLMinify::minify($page_html);
ob_start();
echo $minify;
$output = ob_get_clean();

$dompdf = new Dompdf();
$dompdf->loadHtml($output);
$dompdf->setPaper('A3');
$dompdf->render();
$dompdf->stream("sample.pdf", array("Attachment"=>0)); 
//krumo::dump($output);
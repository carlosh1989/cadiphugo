<?php 
require __DIR__ . '/vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use Dompdf\Dompdf;

$dompdf = new Dompdf();
ob_start();
include('formato_solas2.php');
$dompdf->loadHtml(ob_get_clean());
$dompdf->setPaper('Letter');
$dompdf->render();
$dompdf->stream();
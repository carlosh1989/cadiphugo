<?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOS
use DB\Eloquent;
use Models\Comercio;

require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

new Eloquent();
//\krumo::dump($comercios);

extract($_POST);

?>
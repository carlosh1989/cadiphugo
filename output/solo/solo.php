<?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOS
require('../../autoload.php');

use DB\Eloquent;
use Models\Comercio;
use Models\Jefe;

new Eloquent();
//\krumo::dump($comercios);

extract($_POST);

$solos = Jefe::where('n_personas',1)->where('cod_municipio',5)->where('cod_parroquia',20)->where('bodega',92)->limit(10)->get();

\krumo::dump($solos);
?>


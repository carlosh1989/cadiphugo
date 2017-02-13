<?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOS
use DB\Eloquent;
use Models\Bodega;
use Models\Comercio;
use Models\Parroquia;

require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

new Eloquent();
//\krumo::dump($comercios);
$id_parroquia = $_POST['idparroquia'];
$bodegas = Bodega::where('cod_parroquia',$id_parroquia)->get();
//var_dump($bodegas);
foreach ($bodegas as $key => $bodega) {
	echo '<option value="'.$bodega->id.'">'.$bodega->rason_social.'</option>';
}
?>

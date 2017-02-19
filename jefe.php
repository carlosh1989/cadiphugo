<?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOS
require('autoload.php');
use DB\Eloquent;
use Models\Jefe;
new Eloquent();

extract($_GET);
extract($_POST);


$jefes = Jefe::where('n_personas', '>', 1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('edad', 'desc')->get();
$jefe = Jefe::where('bodega', $bodega)->first();
//\krumo::dump($solos);
?>
<div class="bodega">

<strong>Fecha:</strong><?php echo date('d')."/".date('m')."/".date('Y') ?>
<br>
<strong>Datos de bodega</strong>
<br>
Razón social: <?php echo $jefe->bodeguera->rason_social ?>
<br>
Responsable: <?php echo $jefe->bodeguera->responsable ?>
<br>  
Dirección: <?php echo $jefe->bodeguera->direccion ?>
  
</div>
<h3 align="center">Personas solas</h3>
<table>
    <thead>
      <tr style="background-color:#DCDCDC;">
        <th>Nombre Apellido</th>
        <th>Cédula</th>
        <th>Fecha nacimiento</th>
        <th>Edad</th>
        <th>Personas</th>
      </tr>
    </thead>
    <tbody>
		<?php foreach ($jefes as $jefe): ?>
		<tr>
			<td align="left"><?php echo $jefe->nombre_apellido ?></td>
			<td align="right"><?php echo $jefe->cedula ?></td>
			<td align="center"><?php echo $jefe->fecha_nacimiento ?></td>
			<td align="center"><?php echo $jefe->edad ?></td>
			<td align="center"><?php echo $jefe->n_personas ?></td>
      	</tr>
		<?php endforeach ?>
    </tbody>
  </table>
  <hr>
  <pre>Numero de Familias: <?php echo $jefes->count() ?></pre>
  <pre>Numero de personas: <?php echo $jefes->sum('n_personas') ?></pre>
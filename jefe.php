<?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOS
require('autoload.php');
use DB\Eloquent;
use Models\Jefe;
new Eloquent();
extract($_POST);
$jefes = Jefe::where('n_personas', '>', 1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('edad', 'desc')->get();
?>
<table>
    <thead>
      <tr>
        <th>Nombre Apellido</th>
        <th>Cedula</th>
        <th>fecha nacimiento</th>
        <th>Edad</th>
        <th>Cant. Personas</th>
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